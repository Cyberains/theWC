<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

use App\Models\Category;
use App\Observers\CategoryObserver;
use App\Models\SubCategory;
use App\Observers\SubCategoryObserver;
use App\Models\Product;
use App\Observers\ProductObserver;
use App\Models\Brand;
use App\Observers\BrandObserver;
use App\Models\SubBrand;
use App\Observers\SubBrandObserver;
use App\Models\Manufacturer;
use App\Observers\ManufacturerObserver;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {

        Category::observe(CategoryObserver::class);
        SubCategory::observe(SubCategoryObserver::class);
        // Product::observe(ProductObserver::class);
        Brand::observe(BrandObserver::class);
        SubBrand::observe(SubBrandObserver::class);
        Manufacturer::observe(ManufacturerObserver::class);

    }
}
