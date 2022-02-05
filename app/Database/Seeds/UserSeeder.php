<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data=[
            [
                'user_email'=>'user1@gmail.com',
                'user_password'=>password_hash('123',PASSWORD_BCRYPT),
                'user_name'=>'user1',
                'user_phone'=>'0123456789',
                'user_birth'=>'2001/01/01',
                'user_gender'=>'Nam',
                'user_address'=>'Doi 2 - Co Do - Ba Vi - Ha Noi',
            ],
            [
                'user_email'=>'user2@gmail.com',
                'user_password'=>password_hash('123',PASSWORD_BCRYPT),
                'user_name'=>'user2',
                'user_phone'=>'0123456789',
                'user_birth'=>'2002/02/02',
                'user_gender'=>'Nữ',
                'user_address'=>'Doi 2 - Co Do - Ba Vi - Ha Noi',
            ],
        ];
        $this->db->table('tbl_user')->insertBatch($data);
    }
}
