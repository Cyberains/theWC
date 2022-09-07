<?php

namespace App\Observers;

use App\Models\SubCategory;
use App\Models\Product;

class SubCategoryObserver
{
    /**
     * Handle the SubCategory "created" event.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return void
     */
    public function created(SubCategory $subCategory)
    {
        //
    }

    /**
     * Handle the SubCategory "updated" event.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return void
     */
    public function updated(SubCategory $subCategory)
    {
        //
    }

    /**
     * Handle the SubCategory "deleted" event.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return void
     */
    public function deleted(SubCategory $subCategory)
    {

        Product::where('category_id',$subCategory->category_id)->delete();
        
    }

    /**
     * Handle the SubCategory "restored" event.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return void
     */
    public function restored(SubCategory $subCategory)
    {
        //
    }

    /**
     * Handle the SubCategory "force deleted" event.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return void
     */
    public function forceDeleted(SubCategory $subCategory)
    {
        //
    }
}
