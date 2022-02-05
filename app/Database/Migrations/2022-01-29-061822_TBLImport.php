<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TBLImport extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'import_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'import_date' => [
                'type' => 'datetime',
            ],
            'admin_id' => [
                'type' => 'int',
                'constraint' => 11,
            ],
            'provider_id' => [
                'type' => 'int',
                'constraint' => 11,
            ],
            'import_cost' => [
                'type' => 'int',
                'constraint' => 11,
            ],
            'import_note' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'import_status' => [
                'type' => 'int',
                'constraint' => 11,
            ],
        ]);
        // Khoa CHinh
        $this->forge->addPrimaryKey('import_id');
        // Khoa Ngoai


        // Tao Bang
        $this->forge->createTable('tbl_import');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_import');
    }
}
