<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TBLImportDetail extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'import_detail_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'product_id' => [
                'type' => 'int',
                'constraint' => 11,
            ],
            'import_detail_amount' => [
                'type' => 'int',
                'constraint' => 11,
            ],
            'import_detail_price' => [
                'type' => 'int',
                'constraint' => 11,
            ],
        ]);
        // Khoa CHinh
        $this->forge->addPrimaryKey('import_detail_id');
        $this->forge->addPrimaryKey('product_id');
        // Khoa Ngoai


        // Tao Bang
        $this->forge->createTable('tbl_import_detail');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_import_detail');
    }
}
