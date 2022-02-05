<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TBLAlbum extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'album_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
            ],
            'product_id' => [
                'type' => 'int',
                'constraint' => 11,
            ],
            'album_image' => [
                'type' => 'text',
            ],

        ]);
        $this->forge->addKey('album_id', TRUE);
        $this->forge->createTable('tbl_album');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_album');
    }
}
