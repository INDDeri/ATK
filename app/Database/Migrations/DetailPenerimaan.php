<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DetailPenerimaan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_penerimaan'       => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'id_det_pemesanan' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'jumlah' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'created_at' => [
                'type' => 'TIMESTAMP',
                'null' => TRUE
            ],
            'updated_at' => [
                'type' => 'TIMESTAMP',
                'null' => TRUE
            ],
            'deleted_at' => [
                'type' => 'TIMESTAMP',
                'null' => TRUE
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('tbl_det_penerimaan');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_det_penerimaan');
    }
}
