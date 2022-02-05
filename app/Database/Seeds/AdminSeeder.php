<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $data=[
            [
                'admin_email'=>'admin1@gmail.com',
                'admin_password'=>password_hash('123',PASSWORD_BCRYPT),
                'admin_name'=>'admin1'
            ],
            [
                'admin_email'=>'admin2@gmail.com',
                'admin_password'=>password_hash('123',PASSWORD_BCRYPT),
                'admin_name'=>'admin2'
            ]
        ];
        $this->db->table('tbl_admin')->insertBatch($data);
    }
}
