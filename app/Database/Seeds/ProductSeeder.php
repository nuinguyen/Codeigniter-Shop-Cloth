<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $data=[
            [
                'category_id'=>'1',
                'provider_id'=>'1',
                'producer_id'=>'1',
                'product_name'=>'Ao bommer',
                'product_slug'=>'ao',
                'product_image'=>'anh ao bommer',
                'product_price'=>300000,
                'product_summary'=>'ao rat dep',
                'product_desc'=>'dep nhat ao',
                'product_status'=>1
            ],
            [
                'category_id'=>'1',
                'provider_id'=>'1',
                'producer_id'=>'1',
                'product_name'=>'Quan kaki',
                'product_slug'=>'quan',
                'product_image'=>'anh quan kaki',
                'product_price'=>150000,
                'product_summary'=>'quan rat dep',
                'product_desc'=>'dep nhat quan',
                'product_status'=>1
            ]
        ];
        $this->db->table('tbl_product')->insertBatch($data);
    }
}
