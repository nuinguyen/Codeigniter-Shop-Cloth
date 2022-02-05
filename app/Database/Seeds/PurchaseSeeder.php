<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PurchaseSeeder extends Seeder
{
    public function run()
    {
        $data=[
            [
                'category_name'=>'Quan',
                'category_slug'=>'quan',
                'category_desc'=>'quan ao mang lai cam giac tot',
                'category_status'=>0
            ],
            [
                'category_name'=>'Ao',
                'category_slug'=>'ao',
                'category_desc'=>'ao dep lam',
                'category_status'=>1
            ]
        ];
        $this->db->table('tbl_category')->insertBatch($data);
    }
}
