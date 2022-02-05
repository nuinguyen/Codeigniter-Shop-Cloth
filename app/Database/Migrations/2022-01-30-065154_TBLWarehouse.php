<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TBLWarehouse extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'warehouse_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'warehouse_month' => [
                'type' => 'int',
                'constraint' => 11,
            ],
            'warehouse_year' => [
                'type' => 'int',
                'constraint' => 11,
            ],
            'product_id' => [
                'type' => 'int',
                'constraint' => 11,
            ],
            'warehouse_sum_import' => [
                'type' => 'int',
                'constraint' => 11,
            ],
            'warehouse_sum_inventory' => [
                'type' => 'int',
                'constraint' => 11,
            ],
        ]);
        // Khoa CHinh
        $this->forge->addPrimaryKey('warehouse_id');
        // Khoa Ngoai


        // Tao Bang
        $this->forge->createTable('tbl_warehouse');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_warehouse');
    }
}
