<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TBLReceiver extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'receiver_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'receiver_name' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'receiver_address' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'receiver_phone' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'receiver_note' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
        ]);
        // Khoa CHinh
        $this->forge->addPrimaryKey('receiver_id');
        // Khoa Ngoai


        // Tao Bang
        $this->forge->createTable('tbl_receiver');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_receiver');
    }
}
