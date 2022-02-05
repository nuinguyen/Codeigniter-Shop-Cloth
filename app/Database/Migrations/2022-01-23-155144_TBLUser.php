<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TBLUser extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
            ],
            'user_email' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'unique' => true,
            ],
            'user_password' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'user_name' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'user_phone' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'user_birth' => [
                'type' => 'date',
            ],
            'user_gender' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'user_address' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
        ]);
        $this->forge->addKey('user_id', TRUE);
        $this->forge->createTable('tbl_user');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_user');
    }
}
