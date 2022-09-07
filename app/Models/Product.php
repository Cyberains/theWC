<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;

class Product extends Model
{
	use HasFactory;
	protected $fillable = [
		'category_id', 'subcategory_id', 'brand_id', 'sub-brand_id', 'manufacturer_id',
        'title', 'product_code', 'hsn_code', 'package_type', 'description', 'sgst_tax',
        'cgst_tax', 'igst_tax', 'ugst_tax', 'cess_tax', 'apmc_tax', 'is_active'
	];

    protected static function boot()
    {
        parent::boot();
        static::created(function ($post) {
            $post->slug = $post->generateSlug($post->title);
            $post->discounted_price = $post->price - $post->discount;
            $post->save();
        });
    }
    private function generateSlug($title)
    {
        if (static::whereSlug($slug = Str::slug($title))->exists()) {
            $max = static::whereSlug($title)->latest('id')->skip(1)->value('slug');
            if (isset($max[-1]) && is_numeric($max[-1])) {
                return preg_replace_callback('/(\d+)$/', function($mathces) {
                    return $mathces[1] + 1;
                }, $max);
            }
            return "{$slug}-".Str::random(6);
        }
        return $slug;
    }

    public function getCategory(): HasOne
    {
        return $this->hasOne(Category::class, 'id','category_id');
    }
    public function getSubCategory(): HasOne
    {
        return $this->hasOne(SubCategory::class, 'id','sub_category_id');
    }

	public  function categoryName()
	{

		return $this->belongsTo('App\Models\Category', 'category_id', 'id');
	}

	public  function SubCategoryName()
	{

		return $this->belongsTo('App\Models\SubCategory', 'subcategory_id', 'id');
	}

	public  function BrandName()
	{

		return $this->belongsTo('App\Models\Brand', 'brand_id', 'id');
	}

	public  function SubBrandName()
	{

		return $this->belongsTo('App\Models\SubBrand', 'sub_brand_id', 'id');
	}

	public  function ManufacturerName()
	{

		return $this->belongsTo('App\Models\Manufacturer', 'manufacturer_id', 'id');
	}

	public  function sgstName()
	{

		return $this->belongsTo('App\Models\GSTRate', 'sgst_tax', 'id');
	}

	public  function cgstName()
	{

		return $this->belongsTo('App\Models\GSTRate', 'cgst_tax', 'id');
	}

	public  function igstName()
	{

		return $this->belongsTo('App\Models\GSTRate', 'igst_tax', 'id');
	}

	public  function ugstName()
	{

		return $this->belongsTo('App\Models\GSTRate', 'ugst_tax', 'id');
	}

	public  function cessName()
	{

		return $this->belongsTo('App\Models\GSTRate', 'cess_tax', 'id');
	}
	public  function apmcName()
	{

		return $this->belongsTo('App\Models\GSTRate', 'apmc_tax', 'id');
	}


	public  function productAttribute()
	{

		return $this->hasMany('App\Models\ProductAttribute', 'product_id', 'id');
	}

	public  function productAttributeNames()
	{

		return $this->hasMany('App\Models\ProductAttribute', 'product_id', 'id')->with('productExpiry');
	}

	public  function productExpiryOnline()
	{

		return $this->hasMany('App\Models\ProductExpiry', 'product_id', 'id')->with('productAttr')->where('on_active', 1);
	}

	public  function productImage()
	{

		return $this->hasMany('App\Models\ProductImage', 'product_id', 'id');
	}
	public function productFetaure()
	{
		return $this->hasMany(ProductFeature::class, 'product_id', 'id');
	}
}
