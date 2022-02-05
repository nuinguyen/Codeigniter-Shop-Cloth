<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TBLproducer extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'producer_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'producer_name' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'producer_slug' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'producer_code' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'producer_email' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'producer_phone' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'producer_address' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'producer_image' => [
                'type' => 'text',
            ],

        ]);
        // Khoa CHinh
        $this->forge->addPrimaryKey('producer_id');

        // Tao Bang
        $this->forge->createTable('tbl_producer');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_producer');
    }
}
