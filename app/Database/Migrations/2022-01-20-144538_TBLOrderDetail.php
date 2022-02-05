<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TBLOrderDetail extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'order_detail_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'order_id' => [
                'type' => 'int',
                'constraint' => 11,
            ],
            'product_id' => [
                'type' => 'int',
                'constraint' => 11,
            ],
            'classify_id' => [
                'type' => 'int',
                'constraint' => 11,
            ],
            'order_detail_amount' => [
                'type' => 'int',
                'constraint' => 11,
            ],
        ]);
        // Khoa CHinh
        $this->forge->addPrimaryKey('order_detail_id');
        // Khoa Ngoai


        // Tao Bang
        $this->forge->createTable('tbl_order_detail');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_order_detail');
    }
}
