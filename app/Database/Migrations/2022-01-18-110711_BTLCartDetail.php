<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BTLCartDetail extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'cart_detail_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'cart_id' => [
                'type' => 'int',
                'constraint' => 11,
            ],
            'product_id' => [
                'type' => 'int',
                'constraint' => 11,
            ],
            'cart_detail_amount' => [
                'type' => 'int',
                'constraint' => 11,
            ],
            'classify_id' => [
                'type' => 'int',
                'constraint' => 11,
            ],
        ]);
        // Khoa CHinh
        $this->forge->addPrimaryKey('cart_detail_id');
        // Khoa Ngoai


        // Tao Bang
        $this->forge->createTable('tbl_cart_detail');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_cart_detail');
    }
}
