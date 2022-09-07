<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Session;
Use Alert;
use Excel;
use App\Imports\categoryImport;
use App\Exports\categoryExport;
use App\Models\Brand;
use Auth;
use Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $categorydata = Category::select(\DB::raw('categories.*, brands.title as service'))->leftJoin('brands','brands.id','=','categories.brand_id')->paginate(25);
        $currentpage = $categorydata->currentPage();
        return view('admin.product.category',compact(['categorydata','currentpage']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $service=Brand::orderBy('id','DESC')->get();
        return json_encode($service);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:categories,title',
            'service_id' => 'required|numeric',
            'category_image' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048|dimensions:min_width=400,min_height=400',
        ]);
        if ($request->has('top_category')) {
            $top_category = 1;
        }else{
            $top_category = 0;
        }
        //crop Image
        if ($request->category_image!=null) {
            $save_path = public_path('images/category');
            if (!file_exists($save_path)) {
                mkdir($save_path, 0777, true);
            }
            $imageName = time().'.'.$request->category_image->extension();
            $image = $request->file('category_image');
            $img = Image::make($image->path());
            $img->fit(400,400)->save(public_path('images/category').'/'.$imageName);
        }
        else{
            $imageName=null;
        }
            $category=new Category ();
            $category->brand_id=$request->service_id;
            $category->title=$request->title;
            $category->image=$imageName;
            $category->description=$request->description;
            $category->top_category=$top_category;
            $category->save();
        //Alert::success('', 'Category added successfully.');
        Session::flash('message', 'Category added successfully.');
        return redirect()->route('admin.category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $categoryrow = Category::find($request->id);
        if(!blank($categoryrow)) {
            $categoryrow->service=Brand::where('id',$categoryrow->brand_id)->value('title');
        }
        echo $categoryrow;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'category_image' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048|dimensions:min_width=400,min_height=400',
        ]);
        if ($request->has('top_category')) {
            $top_category = 1;
        }else{
            $top_category = 0;
        }
        $update = Category::find($request->category_id);
        $update->title = $request->title;
        $update->description = $request->description;
        $update->top_category = $top_category;
        $update->save();

        if($request->category_image != '') {
            $save_path = public_path('images/category');
            if (!file_exists($save_path)) {
                mkdir($save_path, 0777, true);
            }
            $getimagename = $update->image;
            $imageName = time().'.'.$request->category_image->extension();
            $image = $request->file('category_image');
            $img = Image::make($image->path());

            $img->fit(400,400)->save(public_path('images/category').'/'.$imageName);
            //$value = $request->category_image->move(public_path('images/category/'), $imageName);
            $imageupdate = Category::where('id',$request->category_id)->update(['image'=>$imageName]);
            if ($getimagename != null) {
                $image_path = public_path().'/images/category/'.$getimagename;
                //dd($image_path);
                if(file_exists($image_path)){
                    unlink($image_path);
                }
            }
        }

        Session::flash('message', 'Category updated successfully.');
        return redirect()->route('admin.category');
    }

    public function import(){

        return view('admin.product.category_import');

    }

    public function importCSV(Request $request){

        $request->validate([

           'import_file' => 'required|mimes:xlsx,txt'

       ]);

       try{

            Excel::import(new categoryImport,request()->file('import_file'));
        }catch ( ValidationException $e ){

            return response()->json(['success'=>'errorList','message'=> $e->errors()]);
        }



       Session::flash('message', 'Category Imported Successfully.');
       return redirect()->route('admin.category');
    }

    public function downloadCSVSample(){

        return Excel::download(new categoryExport, 'category_sheet'.time().'.xlsx');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Category::find($id)->delete();
        Session::flash('message', 'Category deleted successfully.');
        return redirect()->route('admin.category');
    }
      //filter function
   /*public function itemSearch(Request $request){
        $datas=$request->all();

          $categorydata=Category::where('title','LIKE','%'.$datas['query']."%")->paginate(1);
           echo  $categorycount=Category::where('title','LIKE','%'.$datas['query']."%")->count();
                       if(!empty($categorycount))
            {
                $i=1;
            foreach ($categorydata as  $category) {?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $category->title; ?></td>
                    <td><?php echo \Illuminate\Support\Str::limit($category->description, $limit = 20, $end = '...') ?></td>
                    <?php if(Auth::user()->role == 'admin'){ ?>
                    <td>
                       <a title="Edit" href="javascript:void(0)"  onclick="categoryedit( <?php echo $category->id ?>)"  id="category-edit"><i class="fa fa-pencil" style="color: #29b6f6;"></i></a>&nbsp&nbsp

                             <a href="javascript:void(0)" data-url="<?php  route('admin.delete_category',['id'=>$category->id]) ?>"  class="category-delete"><i class="fa fa-trash" style="color: maroon;"></i></a>
                    </td>
                <?php } ?>
                </tr>
          <?php }
            }
            else{?><tr><td colspan="4"><b> No Data Found</b></td></tr><?php }

    }*/

    function itemSearch(Request $request)
    {
        if($request->ajax())
        {
        $datas=$request->all();
        $categorydata=Category::where('title','LIKE','%'.$datas['query']."%")->orWhere('description','LIKE','%'.$datas['query']."%")->paginate(25);
        $categorycount=Category::where('title','LIKE','%'.$datas['query']."%")->orWhere('description','LIKE','%'.$datas['query']."%")->count();
        if($categorycount){
            $currentpage = $categorydata->currentPage();
            return view('admin.product.paggination_category', compact(['categorydata','currentpage']))->render();
            }else{?>
            <tr>
                <td colspan="4">No matching records found</td>
            </tr>
         <?php }
        }
    }
}
