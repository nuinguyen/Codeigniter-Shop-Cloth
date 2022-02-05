<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TBLShipping extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'shipping_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'city_id' => [
                'type' => 'int',
                'constraint' => 11,
            ],
            'district_id' => [
                'type' => 'int',
                'constraint' => 11,
            ],
            'village_id' => [
                'type' => 'int',
                'constraint' => 11,
            ],
            'shipping_fee' => [
                'type' => 'int',
                'constraint' => 11,
            ],
        ]);
        // Khoa CHinh
        $this->forge->addPrimaryKey('shipping_id');
        // Khoa Ngoai


        // Tao Bang
        $this->forge->createTable('tbl_shipping');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_shipping');
    }
}
