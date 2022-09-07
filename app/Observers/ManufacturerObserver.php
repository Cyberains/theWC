<?php

namespace App\Observers;

use App\Models\Manufacturer;
use App\Models\Product;

class ManufacturerObserver
{
    /**
     * Handle the Manufacturer "created" event.
     *
     * @param  \App\Models\Manufacturer  $manufacturer
     * @return void
     */
    public function created(Manufacturer $manufacturer)
    {
        //
    }

    /**
     * Handle the Manufacturer "updated" event.
     *
     * @param  \App\Models\Manufacturer  $manufacturer
     * @return void
     */
    public function updated(Manufacturer $manufacturer)
    {
        //
    }

    /**
     * Handle the Manufacturer "deleted" event.
     *
     * @param  \App\Models\Manufacturer  $manufacturer
     * @return void
     */
    public function deleted(Manufacturer $manufacturer)
    {
        Product::where('manufacturer_id',$manufacturer->id)->delete();
    }

    /**
     * Handle the Manufacturer "restored" event.
     *
     * @param  \App\Models\Manufacturer  $manufacturer
     * @return void
     */
    public function restored(Manufacturer $manufacturer)
    {
        //
    }

    /**
     * Handle the Manufacturer "force deleted" event.
     *
     * @param  \App\Models\Manufacturer  $manufacturer
     * @return void
     */
    public function forceDeleted(Manufacturer $manufacturer)
    {
        //
    }
}
