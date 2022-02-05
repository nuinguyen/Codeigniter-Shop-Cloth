<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TBLAdmin extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'admin_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
            ],
            'admin_email' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'unique' => true,
            ],
            'admin_password' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'admin_name' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
        ]);
        $this->forge->addKey('admin_id', TRUE);
        $this->forge->createTable('tbl_admin');
    }
    public function down()
    {
        $this->forge->dropTable('tbl_admin');
    }
}
