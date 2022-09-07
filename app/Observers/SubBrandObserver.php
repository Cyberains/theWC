<?php

namespace App\Observers;

use App\Models\SubBrand;

class SubBrandObserver
{
    /**
     * Handle the SubBrand "created" event.
     *
     * @param  \App\Models\SubBrand  $subBrand
     * @return void
     */
    public function created(SubBrand $subBrand)
    {
        //
    }

    /**
     * Handle the SubBrand "updated" event.
     *
     * @param  \App\Models\SubBrand  $subBrand
     * @return void
     */
    public function updated(SubBrand $subBrand)
    {
        //
    }

    /**
     * Handle the SubBrand "deleted" event.
     *
     * @param  \App\Models\SubBrand  $subBrand
     * @return void
     */
    public function deleted(SubBrand $subBrand)
    {
        Product::where('brand_id',$subBrand->brand_id)->delete();
    }

    /**
     * Handle the SubBrand "restored" event.
     *
     * @param  \App\Models\SubBrand  $subBrand
     * @return void
     */
    public function restored(SubBrand $subBrand)
    {
        //
    }

    /**
     * Handle the SubBrand "force deleted" event.
     *
     * @param  \App\Models\SubBrand  $subBrand
     * @return void
     */
    public function forceDeleted(SubBrand $subBrand)
    {
        //
    }
}
