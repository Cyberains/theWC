<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Alert;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;
use Illuminate\Http\File;
use DB;
use Excel;
use App\Exports\brandExport;
use App\Imports\brandImport;
use Auth;
use Image;
use Khsing\World\Models\City;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $branddata = Brand::paginate(25);
        $currentpage = $branddata->currentPage();
        return view('admin.product.brand', compact(['branddata', 'currentpage']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $city = \DB::table('world_cities')->orderBy('id', 'desc')->get();
        echo $city;
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
            'city_id' => 'required',
            'title' => 'required|unique:brands,title',
            'brand_image' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048|dimensions:min_width=400,min_height=400',
        ]);

        if ($request->has('top_brand')) {

            $top_brand = 1;
        } else {

            $top_brand = 0;
        }

        if ($request->brand_image != null) {

            $save_path = public_path('images/brand');

            if (!file_exists($save_path)) {
                mkdir($save_path, 0777, true);
            }

            $imageName = time() . '.' . $request->brand_image->extension();

            $image = $request->file('brand_image');
            $img = Image::make($image->path());

            $img->fit(400, 400)->save(public_path('images/brand') . '/' . $imageName);

            //$value = $request->brand_image->move(public_path('images/brand'), $imageName);


        } else {
            $imageName = null;
        }


        $brand = new Brand();
        $brand->city_id = $request->city_id;
        $brand->title = $request->title;
        $brand->image = $imageName;
        $brand->description = $request->description;
        $brand->top_brand = $top_brand;
        $brand->save();

        Session::flash('message', 'Brand added successfully.');
        return redirect()->route('admin.brand');
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
        $brandrow = Brand::find($request->id);
        echo $brandrow;
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

            'brand_image' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048|dimensions:min_width=400,min_height=400'

        ]);

        if ($request->has('top_brand')) {

            $top_brand = 1;
        } else {

            $top_brand = 0;
        }

        $update = Brand::find($request->brand_id);
        $update->title = $request->title;
        $update->description = $request->description;
        $update->top_brand = $top_brand;
        $update->save();

        if ($request->brand_image != '') {

            $save_path = public_path('images/brand');

            if (!file_exists($save_path)) {
                mkdir($save_path, 0777, true);
            }

            $getimagename = $update->image;

            $imageName = time() . '.' . $request->brand_image->extension();

            $image = $request->file('brand_image');
            $img = Image::make($image->path());

            $img->fit(400, 400)->save(public_path('images/brand') . '/' . $imageName);

            //$value = $request->brand_image->move(public_path('images/brand/'), $imageName);

            $imageupdate = Brand::where('id', $request->brand_id)->update(['image' => $imageName]);

            if ($getimagename != null) {

                $image_path = public_path() . '/images/brand/' . $getimagename;

                if (file_exists($image_path)) {

                    unlink($image_path);
                }
            }
        }

        Session::flash('message', 'Brand updated successfully.');
        return redirect()->route('admin.brand');
    }

    public function import()
    {

        return view('admin.product.brand_import');
    }

    public function importCSV(Request $request)
    {

        $request->validate([

            'import_file' => 'required|mimes:xlsx,txt'

        ]);

        try {

            Excel::import(new brandImport, request()->file('import_file'));
        } catch (ValidationException $e) {

            return response()->json(['success' => 'errorList', 'message' => $e->errors()]);
        }



        Session::flash('message', 'Brand Imported Successfully.');
        return redirect()->route('admin.brand');
    }

    public function downloadCSVSample()
    {

        return Excel::download(new brandExport, 'brand_sheet' . time() . '.xlsx');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Brand::find($id)->delete();
        Session::flash('message', 'Brand deleted successfully.');
        return redirect()->route('admin.brand');
    }

    function itemSearch(Request $request)
    {
        if ($request->ajax()) {
            $datas = $request->all();
            $branddata = Brand::where('title', 'LIKE', '%' . $datas['query'] . "%")->orWhere('description', 'LIKE', '%' . $datas['query'] . "%")->paginate(25);
            $brandcount = Brand::where('title', 'LIKE', '%' . $datas['query'] . "%")->orWhere('description', 'LIKE', '%' . $datas['query'] . "%")->count();
            if ($brandcount) {
                $currentpage = $branddata->currentPage();
                return view('admin.product.paggination_brand', compact(['branddata', 'currentpage']))->render();
            } else { ?>
                <tr>
                    <td colspan="5">No matching records found</td>
                </tr>
<?php }
        }
    }
}
