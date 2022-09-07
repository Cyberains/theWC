<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Offer;
use App\Models\ProductAttribute;
use App\Models\Product;

class OfferDelete extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'offer:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */

    public function handle()
    {

        $offerdata = Offer::where('end_date','<',date('Y-m-d H:i:s',strtotime(now())))->get();

        if ($offerdata->count()>0) {
           
            foreach ($offerdata as $offer) {
                
                $productattrdata = ProductAttribute::find($offer->productattr_id);

                $productattrdata->selling_price = $offer->selling_price;
                $productattrdata->offer_status = 0;
                $productattrdata->save();

                $offer->delete();

            }
       }

       
        

    }
}
