<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Validator;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ProductExpiry;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;
use App\Models\SubBrand;
use App\Models\Manufacturer;
use App\Models\GSTRate;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class ProductImport implements ToCollection, WithHeadingRow, WithValidation
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $rows)
    {

        foreach ($rows as $row) {


            if ($row['expiry_date'] != '' || $row['expiry_date'] != null) {

                $expirydateformat = Date::excelToDateTimeObject($row['expiry_date']);
                $expirydate = $expirydateformat->format('Y-m-d');
            } else {

                $expirydate = null;
            }

            if ($row['mfg_date'] != '' || $row['mfg_date'] != null) {
                $mfgdateformat = Date::excelToDateTimeObject($row['mfg_date']);

                $mfgdate = $mfgdateformat->format('Y-m-d');
            } else {

                $mfgdate = null;
            }


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


            if ($row['sub_brand'] == null) {

                $subbrand = null;
            } else {

                $subbrand = SubBrand::where('title', $row['sub_brand'])->first()->id;
            }

            if ($row['sgst_tax'] == null) {

                $sgst_tax = null;
            } else {

                $sgst_tax = GSTRate::where('gst_type', $row['sgst_tax'])->first()->id;
            }

            if ($row['cgst_tax'] == null) {

                $cgst_tax = null;
            } else {

                $cgst_tax = GSTRate::where('gst_type', $row['cgst_tax'])->first()->id;
            }

            if ($row['igst_tax'] == null) {

                $igst_tax = null;
            } else {

                $igst_tax = GSTRate::where('gst_type', $row['igst_tax'])->first()->id;
            }

            if ($row['ugst_tax'] == null) {

                $ugst_tax = null;
            } else {

                $ugst_tax = GSTRate::where('gst_type', $row['ugst_tax'])->first()->id;
            }

            if ($row['cess_tax'] == null) {

                $cess_tax = null;
            } else {

                $cess_tax = GSTRate::where('gst_type', $row['cess_tax'])->first()->id;
            }

            if ($row['apmc_tax'] == null) {

                $apmc_tax = null;
            } else {

                $apmc_tax = GSTRate::where('gst_type', $row['apmc_tax'])->first()->id;
            }


            if (Product::where('title', $row['title'])->count() == 0) {

                $category = Category::where('title', $row['category'])->first();

                $subcategory = SubCategory::where('category_id', $category->id)->where('title', $row['sub_category'])->first();

                $product = Product::create([

                    'category_id' => $category->id,
                    'subcategory_id' => $subcategory->id,
                    'brand_id' => (Brand::where('title', $row['brand'])->first())->id,
                    'sub_brand_id' => $subbrand,
                    'manufacturer_id' => (Manufacturer::where('title', $row['manufacturer'])->first())->id,
                    'sgst_tax' => $sgst_tax,
                    'cgst_tax' => $cgst_tax,
                    'igst_tax' => $igst_tax,
                    'ugst_tax' => $ugst_tax,
                    'cess_tax' => $cess_tax,
                    'apmc_tax' => $apmc_tax,
                    'title' => $row['title'],
                    'product_code' => $new_product_id,
                    'hsn_code' => $row['hsn_code'],
                    'package_type' => $row['sub_category_type'],
                    'description' => $row['description'],
                    'is_active' => 1,

                ]);


                if ($row['barcode'] != '' || $row['barcode'] != null) {

                    $new_productattr_id = $row['barcode'];
                } else {


                    $productattrlastrow = ProductAttribute::where('barcode_id', 'LIKE', '%CODE%')->orderBy('id', 'DESC')->first();

                    if ($productattrlastrow != null) {

                        $last_productattr_id = $productattrlastrow->barcode_id;

                        $product_id_array = explode('CODE', $last_productattr_id);

                        $productattr_id_number = $product_id_array[1];

                        $counter = str_pad((int)$productattr_id_number + 1, 8, "0", STR_PAD_LEFT);

                        $new_productattr_id = 'CODE' . $counter;
                    } else {

                        $new_productattr_id = 'CODE00000001';
                    }
                }

                if ($row['cost_price'] != '' || $row['cost_price'] != 0) {

                    $productdata = Product::with(['sgstName', 'cgstName', 'igstName', 'ugstName', 'cessName', 'apmcName'])->find($product->id);

                    $tax  = get_Total_Tax($productdata);

                    $basic_price = floatval($row['cost_price']) * 100 / ($tax + 100);
                } else {

                    $basic_price = null;
                }

                $prodcutattr = ProductAttribute::create([

                    'product_id' => $product->id,
                    'barcode_id' => $new_productattr_id,
                    'unit' => $row['weight'],
                    'unit_check' => $row['unit'],
                    'mrp_price' => $row['mrp_price'],
                    'selling_price' => $row['selling_price'],
                    'membership_price' => $row['membership_price'],
                    'cost_price' => $row['cost_price'],
                    'eb_cost_price' => $row['sv_sell_price'],
                    'basic_price' => $basic_price,
                    'is_active' => 1,

                ]);

                if ((ProductExpiry::where('productattr_id', $prodcutattr->id)->get())->count() > 0) {

                    $productattrdata = ProductExpiry::where('productattr_id', $request->product_attr)->min('expiry_date');

                    if ($productattrdata == null && $request->expiry_date == null) {

                        $active = 0;
                    } elseif ($productattrdata == null && $request->expiry_date != null) {

                        ProductExpiry::where('productattr_id', $request->product_attr)->update(['on_active' => 0]);
                        $active = 1;
                    } else {

                        if ($productattrdata > $request->expiry_date) {

                            ProductExpiry::where('productattr_id', $request->product_attr)->update(['on_active' => 0]);

                            $active = 1;
                        } else {

                            $active = 0;
                        }
                    }
                } else {

                    $active = 1;
                }

                ProductExpiry::create([

                    'product_id' => $product->id,
                    'productattr_id' => $prodcutattr->id,
                    'aisle' => $row['aisle'],
                    'rack' => $row['rack'],
                    'shelf' => $row['shelf'],
                    'quantity' => $row['net_stock'],
                    'mfg_date' => $mfgdate,
                    'expiry_date' => $expirydate,
                    'on_active' => $active

                ]);
            }
        }
    }

    public function rules(): array
    {

        $categoryarr = array();
        $category = Category::get(['id', 'title']);
        foreach ($category as $c) {

            array_push($categoryarr, $c->title);
        }

        $subcategoryarr = array();
        $subcategory = SubCategory::get(['id', 'title']);
        foreach ($subcategory as $s) {

            array_push($subcategoryarr, $s->title);
        }

        $brandarr = array();
        $brand = Brand::get(['id', 'title']);
        foreach ($brand as $b) {

            array_push($brandarr, $b->title);
        }

        $subbrandarr = array();
        $subbrand = SubBrand::get(['id', 'title']);
        foreach ($subbrand as $sb) {

            array_push($subbrandarr, $sb->title);
        }

        $manufacturerarr = array();
        $manufacturer = Manufacturer::get(['id', 'title']);
        foreach ($manufacturer as $m) {

            array_push($manufacturerarr, $m->title);
        }

        $gstratearr = array();
        $gstdata = GSTRate::get();
        foreach ($gstdata as $m) {

            array_push($gstratearr, $m->gst_type);
        }

        return [

            'category' => 'required|in:' . implode(',', $categoryarr),
            'sub_category' => 'required|in:' . implode(',', $subcategoryarr),
            'brand' => 'required|in:' . implode(',', $brandarr),
            'sub_brand' => 'nullable|in:' . implode(',', $subbrandarr),
            'manufacturer' => 'required|in:' . implode(',', $manufacturerarr),
            'title' => 'required',
            'hsn_code' => 'nullable',
            'sub_category_type' => 'nullable',
            'sgst_tax' => 'nullable|in:' . implode(',', $gstratearr),
            'cgst_tax' => 'nullable|in:' . implode(',', $gstratearr),
            'igst_tax' => 'nullable|in:' . implode(',', $gstratearr),
            'ugst_tax' => 'nullable|in:' . implode(',', $gstratearr),
            'cess_tax' => 'nullable|in:' . implode(',', $gstratearr),
            'apmc_tax' => 'nullable|in:' . implode(',', $gstratearr),
            'mrp_price' => 'required|numeric',
            'selling_price' => 'required|numeric',
            'membership_price' => 'nullable|numeric',
            'cost_price' => 'nullable|numeric',
            'sv_sell_price' => 'nullable|numeric',
            'weight' => 'nullable',
            'unit' => 'required',
            'net_stock' => 'required',
            'mfg_date' => 'nullable',
            'expiry_date' => 'nullable',


        ];
    }

    public function withValidator($validator)
    {

        $validator->after(function ($validator) {

            $datas = $validator->getData();

            $dataarr = array();

            foreach ($datas as $data => $value) {

                if (is_numeric($value['expiry_date']) || $value['expiry_date'] == '' || $value['expiry_date'] == null) {

                    $tell = true;
                } else {

                    $validator->errors()->add($data, 'Enter Valid Expiry date.');
                }

                if (is_numeric($value['mfg_date']) || $value['mfg_date'] == '' || $value['mfg_date'] == null) {

                    $tell = true;
                } else {

                    $validator->errors()->add($data, 'Enter Valid Manufacturing date.');
                }

                $category = Category::where('title', $value['category'])->first();

                if ($category != null) {

                    $subcategorydata = SubCategory::where('category_id', $category->id)->get(['title']);

                    $subcategoryarr = array();

                    foreach ($subcategorydata as $sc) {

                        array_push($subcategoryarr, $sc->title);
                    }

                    if (!in_array($value['sub_category'], $subcategoryarr)) {

                        $validator->errors()->add($data, 'Sub category does not exists to this category. ');
                    }
                } else {

                    $validator->errors()->add($data, 'Category does not exists.');
                }


                if ($value['sub_brand'] != null) {


                    $brand = Brand::where('title', $value['brand'])->first();

                    if ($brand != null) {

                        $subbranddata = SubBrand::where('brand_id', $brand->id)->get(['title']);

                        $subbrandarr = array();

                        foreach ($subbranddata as $sb) {

                            array_push($subcategoryarr, $sb->title);
                        }

                        if (!in_array($value['sub_brand'], $subbrandarr)) {

                            $validator->errors()->add($data, 'Sub Brand does not exists to this Brand. ');
                        }
                    } else {

                        $validator->errors()->add($data, 'Brand does not exists.');
                    }
                }
            }
        });
    }
}
