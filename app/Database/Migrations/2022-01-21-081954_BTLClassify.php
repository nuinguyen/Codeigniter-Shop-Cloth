<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BTLClassify extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'classify_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'classify_type' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'classify_value' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],

        ]);
        // Khoa CHinh
        $this->forge->addPrimaryKey('classify_id');
        // Tao Bang
        $this->forge->createTable('tbl_classify');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_classify');
    }
}
