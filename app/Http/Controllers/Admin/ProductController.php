<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Manufacturer;
use App\Models\ProductImage;
use App\Models\ProductAttribute;
use App\Models\ProductExpiry;
use App\Models\GSTRate;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use App\Exports\ProductExport;
use App\Exports\ProductDataExport;
use App\Imports\ProductImport;
use Excel;
use App\Models\SubCategory;
use Image;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $productdata = Product::paginate(25);

        $currentpage = $productdata->currentPage();
        $categorydata = Category::get();
        $branddata = Brand::get();
        $manufacturerdata = Manufacturer::get();
        $gstdata = GSTRate::get();

        return view('admin.product.product', compact(['categorydata', 'productdata', 'branddata', 'manufacturerdata', 'gstdata', 'currentpage']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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

            'title' => 'required|unique:products,title',
        ]);

        $productlastrow = Product::orderBy('id', 'DESC')->first();

        if ($productlastrow != null) {
            $last_product_id = $productlastrow->product_code;
            $product_id_array = explode('EB102', $last_product_id);
            $product_id_number = $product_id_array[1];
            $counter = str_pad((int)$product_id_number + 1, 7, "0", STR_PAD_LEFT);

            $new_product_id = 'EB102' . $counter;
        } else {

            $new_product_id = 'EB1020000001';
        }

        // if ($request->image) {
        //     $save_path = public_path('images/category');
        //     if (!file_exists($save_path)) {
        //         mkdir($save_path, 0777, true);
        //     }
        //     $imageName = time() . '.' . pathinfo($request->image, PATHINFO_EXTENSION);
        //     $image = $request->file('image');
        //     $img = Image::make($image->path());
        //     $img->fit(400, 400)->save(public_path('images/category') . '/' . $imageName);
        //     //$value = $request->category_image->move(public_path('images/category'), $imageName);
        // } else {
        //     $imageName = null;
        // }
        $product =   new Product();
        $product->title = $request->title;
        $product->category_id = $request->category;
        $product->subcategory_id = $request->subcategory;
        $product->brand_id = $request->brand;
        $product->price = $request->price;
        $product->discount_amt = $request->discount_amt;
        $product->discount_percentage = $request->discount_percentage;
        $product->time_in_min = $request->time_in_min;
        $product->product_code = $new_product_id;
        $product->description = $request->description;
        $product->is_active = 1;
        $product->save();


        //Alert::success('', 'Category added successfully.');
        Session::flash('message', 'Product added successfully.');
        return redirect()->route('admin.product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $productdata = Product::find($id);
        $productimage = ProductImage::where('product_id', $id)->get();
        $productattriute = ProductAttribute::where('product_id', $id)->where('is_active', 1)->first();
        $productexpiry = ProductExpiry::where('product_id', $id)->where('productattr_id', @$productattriute->id)->where('on_active', 1)->first();
        return view('admin.product.product_view', compact('productdata', 'productimage', 'productattriute', 'productexpiry'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $productrow = Product::find($request->id);
        echo $productrow;
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

        $update = Product::find($request->product_id);
        $update->title = $request->title;
        $update->category_id = $request->category;
        $update->subcategory_id = $request->subcategory;
        $update->brand_id = $request->brand;
        $update->sub_brand_id = $request->subbrand;
        $update->manufacturer_id = $request->manufacturer;
        $update->hsn_code = $request->hsn;
        $update->sgst_tax = $request->sgst_tax;
        $update->cgst_tax = $request->cgst_tax;
        $update->igst_tax = $request->igst_tax;
        $update->ugst_tax = $request->ugst_tax;
        $update->cess_tax = $request->cess_tax;
        $update->apmc_tax = $request->apmc_tax;
        $update->package_type = $request->package_type;
        $update->description = $request->description;
        $update->save();

        Session::flash('message', 'Product updated successfully.');
        return redirect()->route('admin.product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        Session::flash('message', 'Product deleted successfully.');
        return redirect()->route('admin.product');
    }

    public function destroyImage($id)
    {

        $imagedata = ProductImage::find($id);
        $productid = $imagedata->product_id;
        $productimage = $imagedata->image;
        $imagedata->delete();

        $image_path = public_path('images/product/' . $productimage);
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        Session::flash('message', 'Product Image deleted successfully.');
        return redirect()->route("admin.view_product", ['id' => $productid]);
    }

    public function toggle(Request $request)
    {

        if (isset($request->status) && isset($request->id)) {

            $update = Product::where('id', $request->id)->update(['is_active' => $request->status]);

            if ($update) {

                echo 1;
            }
        }
    }

    public function image(Request $request)
    {


        $request->validate([

            'productImg.*' => 'required|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('productImg')) {

            $path = public_path('images/product');


            if (!File::isDirectory($path)) {

                File::makeDirectory($path, 0777, true, true);
            }

            $lastimage = ProductImage::orderBy('id', 'DESC')->first();

            if ($lastimage != null) {

                $last_image_id = $lastimage->image;

                $image_id_array = explode('IMG', $last_image_id);

                $image_id_number = $image_id_array[1];

                $counter = str_pad((int)$image_id_number + 1, 9, "0", STR_PAD_LEFT);

                $imagestr = 'IMG' . $counter;
            } else {

                $imagestr = 'IMG000000001';
            }


            foreach ($request->productImg as $image) {

                $imageName = $imagestr . '.' . $image->extension();
                $value = $image->move(public_path('images/product'), $imageName);

                if ($value) {

                    $form_data = [

                        'product_id' => $request->product_id,
                        'image' => $imageName,

                    ];

                    ProductImage::create($form_data);
                }

                $image_id_array = explode('IMG', $imagestr);

                $image_id_number = $image_id_array[1];

                $counter = str_pad((int)$image_id_number + 1, 9, "0", STR_PAD_LEFT);

                $imagestr = 'IMG' . $counter;
            }

            Session::flash('message', 'Product Image added successfully.');
            return redirect()->route("admin.view_product", ['id' => $request->product_id]);
        }
    }

    public function export()
    {

        return Excel::download(new ProductDataExport, 'productdata_sheet' . time() . '.xlsx');
    }

    public function import()
    {

        return view('admin.product.product_import');
    }

    public function importCSV(Request $request)
    {

        $request->validate([

            'import_file' => 'required|mimes:xlsx,txt'

        ]);

        try {

            Excel::import(new ProductImport, request()->file('import_file'));
        } catch (ValidationException $e) {

            return response()->json(['success' => 'errorList', 'message' => $e->errors()]);
        }



        Session::flash('message', 'Products Imported Successfully.');
        return redirect()->route('admin.product');
    }

    public function downloadCSVSample()
    {

        return Excel::download(new ProductExport, 'product_sheet' . time() . '.xlsx');
    }
    //filter function
    public function itemSearch(Request $request)
    {
        if ($request->ajax()) {
            $datas = $request->all();
            //Category
            $categories = Category::where('title', 'LIKE', '%' . $datas['query'] . '%')->get();
            $categoriescount = Category::where('title', 'LIKE', '%' . $datas['query'] . '%')->count();
            //subcategory
            $subcategories = SubCategory::where('title', 'LIKE', '%' . $datas['query'] . '%')->get();
            //Brand
            $brand = Brand::where('title', 'LIKE', '%' . $datas['query'] . '%')->get();
            $cate = array();
            $subcate = array();
            $brandcate = array();
            if ($categories) {
                foreach ($categories as $select) {
                    $cate[] = $select->id;
                }
            }

            if ($subcategories) {
                foreach ($subcategories as $select) {
                    $subcate[] = $select->id;
                }
            }
            if ($brand) {
                foreach ($brand as $select) {
                    $brandcate[] = $select->id;
                }
            }
            if ($cate) {
                $productdata = Product::whereIn('category_id', $cate)
                    ->paginate(25);
                $productdatacount = Product::whereIn('category_id', $cate)
                    ->count();
            } elseif ($subcate) {
                $productdata = Product::whereIn('subcategory_id', $subcate)
                    ->paginate(25);
                $productdatacount = Product::whereIn('subcategory_id', $subcate)
                    ->count();
            } elseif ($brandcate) {
                $productdata = Product::whereIn('brand_id', $brandcate)
                    ->paginate(25);
                $productdatacount = Product::whereIn('brand_id', $brandcate)
                    ->count();
            } else {

                $productdata = Product::where('title', 'LIKE', '%' . $datas['query'] . "%")
                    ->orWhere('description', 'LIKE', '%' . $datas['query'] . "%")
                    ->orWhere('product_code', 'LIKE', '%' . $datas['query'] . "%")
                    ->paginate(25);
                $productdatacount = Product::where('title', 'LIKE', '%' . $datas['query'] . "%")
                    ->orWhere('description', 'LIKE', '%' . $datas['query'] . "%")
                    ->orWhere('product_code', 'LIKE', '%' . $datas['query'] . "%")
                    ->count();
            }

            if ($productdatacount) {
                $currentpage = $productdata->currentPage();
                return view('admin.product.paggination_product', compact(['productdata', 'currentpage']))->render();
            } else { ?>
                <tr>
                    <td colspan="8">No matching records found</td>
                </tr>
<?php
            }
        }
    }
}
