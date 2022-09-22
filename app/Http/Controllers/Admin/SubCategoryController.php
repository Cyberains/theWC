<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;
Use Alert;
use Auth;
class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $categorydata = Category::get();
        $subcategorydata = SubCategory::with('getCategoryName')->paginate(25);
        $currentpage = $subcategorydata->currentPage();
        return view('admin.product.subcategory',compact(['categorydata','subcategorydata','currentpage']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */

    public function store(Request $request)
    {

        if ($request->image!=null) {
            $save_path = public_path('images/subcategory');
            if (!file_exists($save_path)) {
                mkdir($save_path, 0777, true);
            }
            $imageName = time().'.'.$request->image->extension();
            $image = $request->file('image');
            $img = Image::make($image->path());
            $img->fit(400,400)->save(public_path('images/subcategory').'/'.$imageName);
        }
        else{
            $imageName=null;
        }

        $form_data=[
            'category_id'=>$request->category,
            'title'=>$request->title,
            'description'=>$request->description
        ];

        $form_data['image'] = $imageName;
        $form_data['base_path'] = url('public/images/subcategory');

        SubCategory::create($form_data);
        Session::flash('message', 'SubCategory added successfully.');
        return redirect()->route('admin.subcategory');
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
        $subcategoryrow = SubCategory::find($request->id);
        echo $subcategoryrow;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        if ($request->image != null) {
            $save_path = public_path('images/subcategory');
            if (!file_exists($save_path)) {
                mkdir($save_path, 0777, true);
            }
            $imageName = time().'.'.$request->image->extension();
            $image = $request->file('image');
            $img = Image::make($image->path());
            $img->fit(400,400)->save(public_path('images/subcategory').'/'.$imageName);
        }
        else{
            $imageName = null;
        }


        $update = Subcategory::find($request->subcategory_id);

        if( File::exists(public_path('images/subcategory/'.$update->image)) ) {
            File::delete(public_path('images/subcategory/'.$update->image));
        }

        $update->title = $request->title;
        $update->description = $request->description;
        $update->image = $imageName ?? $update->image;
        $update->save();

        Session::flash('message', 'SubCategory updated successfully.');
        return redirect()->route('admin.subcategory');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        SubCategory::find($id)->delete();
        Session::flash('message', 'SubCategory deleted successfully.');
        return redirect()->route('admin.subcategory');
    }

    public function GetSubCategory(Request $request){
        $subcategorydata = SubCategory::where('category_id',$request->id)->get();
        echo $subcategorydata;
    }
         //filter function
    function itemSearch(Request $request)
    {
        $datas=$request->all();
        $categorydata = Category::where('title','LIKE','%'.$datas['query']."%")->get();
        $cate=array();
        $subcatcount=0;
        if($categorydata){
            foreach ($categorydata as $select) {
               $cate[]=$select->id;
            }
        }
        if($cate){
          $subcategorydata=SubCategory::whereIn('category_id',$cate)->paginate(25);
          $subcatcount=SubCategory::whereIn('category_id',$cate)->count();
        }else{
          $subcategorydata=SubCategory::where('title','LIKE','%'.$datas['query']."%")->orWhere('description','LIKE','%'.$datas['query']."%")->paginate(25);
          $subcatcount=SubCategory::where('title','LIKE','%'.$datas['query']."%")->orWhere('description','LIKE','%'.$datas['query']."%")->count();
        }
        if($subcatcount>0){
            $currentpage = $subcategorydata->currentPage();
        return view('admin.product.paggination_subcategory', compact(['subcategorydata','currentpage']))->render();
        }else{?>
            <tr>
            <td colspan="6">No matching records found</td>
            </tr>
        <?php }
    }
}
