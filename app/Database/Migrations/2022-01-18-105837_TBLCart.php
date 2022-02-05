<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TBLCart extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'cart_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'user_id' => [
                'type' => 'int',
                'constraint' => 11,
            ],
        ]);
        // Khoa CHinh
        $this->forge->addPrimaryKey('cart_id');

        // Tao Bang
        $this->forge->createTable('tbl_cart');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_cart');
    }
}
