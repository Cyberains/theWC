<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modules')->insert([

        	[

            'name' =>'customer_management',
            'sub_module' => 'customers',
            
        	],

        	[

            'name' =>'customer_management',
            'sub_module' => 'role',
            
        	],

	    	[

	    	'name' =>'product_management',
            'sub_module' => 'gst',

	    	],

	    	[

	    	'name' =>'product_management',
            'sub_module' => 'category',

	    	],

	    	[

	    	'name' =>'product_management',
            'sub_module' => 'subcategory',

	    	],

	    	[

	    	'name' =>'product_management',
            'sub_module' => 'brand',

	    	],

	    	[

	    	'name' =>'product_management',
            'sub_module' => 'subbrand',

	    	],

	    	[

	    	'name' =>'product_management',
            'sub_module' => 'manufacturer',

	    	],

	    	[

	    	'name' =>'product_management',
            'sub_module' => 'product',

	    	],

	    	[

	    	'name' =>'product_management',
            'sub_module' => 'product_attribute',

	    	],

	    	[

	    	'name' =>'product_management',
            'sub_module' => 'product_expiry',

	    	],

	    	[

	    	'name' =>'billing_management',
            'sub_module' => 'membership',

	    	],

	    	[

	    	'name' =>'billing_management',
            'sub_module' => 'generate_bill',

	    	],

	    	[

	    	'name' =>'billing_management',
            'sub_module' => 'barcode_label',

	    	],

	    	[

	    	'name' =>'vendor_management',
            'sub_module' => 'supplier',

	    	],

	    	[

	    	'name' =>'vendor_management',
            'sub_module' => 'purchase',

	    	],

	    	[

	    	'name' =>'vendor_management',
            'sub_module' => 'receive_po',

	    	],

	    	[

	    	'name' =>'report_management',
            'sub_module' => 'po_report',

	    	],
	    ]);
    }
}
