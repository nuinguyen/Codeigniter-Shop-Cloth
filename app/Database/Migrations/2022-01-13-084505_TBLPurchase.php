<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TBLPurchase extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'category_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'category_name' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'category_slug' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'category_desc' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'category_status' => [
                'type' => 'int',
                'constraint' => 11,
            ],

        ]);
        $this->forge->addKey('category_id', TRUE);
        $this->forge->createTable('tbl_category');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_category');
    }
}
