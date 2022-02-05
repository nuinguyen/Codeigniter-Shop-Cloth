<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BTLProductClassify extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'product_classify_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'product_id' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'classify_id' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
        ]);
        // Khoa CHinh
        $this->forge->addPrimaryKey('product_classify_id');
        // Tao Bang
        $this->forge->createTable('tbl_product_classify');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_product_classify');
    }
}
