<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BTLProduct extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'product_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'category_id' => [
                'type' => 'int',
                'constraint' => 11,
            ],
            'provider_id' => [
                'type' => 'int',
                'constraint' => 11,
            ],
            'producer_id' => [
                'type' => 'int',
                'constraint' => 11,
            ],
            'product_name' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'product_slug' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'product_image' => [
                'type' => 'text',
            ],
            'product_price' => [
                'type' => 'int',
                'constraint' => 11,
            ],
            'product_summary' => [
                'type' => 'text',
            ],
            'product_desc' => [
                'type' => 'text',
            ],
            'product_status' => [
                'type' => 'int',
                'constraint' => 11,
            ],

        ]);
        // Khoa CHinh
        $this->forge->addPrimaryKey('product_id');
        // Khoa Ngoai


        // Tao Bang
        $this->forge->createTable('tbl_product');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_product');
    }
}
