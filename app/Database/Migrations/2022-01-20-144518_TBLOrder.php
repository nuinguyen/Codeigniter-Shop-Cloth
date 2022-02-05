<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TBLOrder extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'order_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'user_id' => [
                'type' => 'int',
                'constraint' => 11,
            ],
            'receiver_id' => [
                'type' => 'int',
                'constraint' => 11,
            ],
            'order_shipping_fee' => [
                'type' => 'int',
                'constraint' => 11,
            ],
            'order_method' => [
                'type' => 'int',
                'constraint' => 11,
            ],
            'order_status' => [
                'type' => 'int',
                'constraint' => 11,
            ],
            'order_date' => [
                'type' => 'datetime',
            ],
        ]);
        // Khoa CHinh
        $this->forge->addPrimaryKey('order_id');
        // Khoa Ngoai


        // Tao Bang
        $this->forge->createTable('tbl_order');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_order');
    }
}
