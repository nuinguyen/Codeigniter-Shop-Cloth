<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TBLProvider extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'provider_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'provider_name' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'provider_code' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'provider_email' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'provider_phone' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'provider_address' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'provider_image' => [
                'type' => 'text',
            ],

        ]);
        // Khoa CHinh
        $this->forge->addPrimaryKey('provider_id');

        // Tao Bang
        $this->forge->createTable('tbl_provider');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_provider');
    }
}
