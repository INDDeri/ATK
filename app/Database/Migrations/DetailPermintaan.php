<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DetailPermintaan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_permintaan'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_det_permintaan'       => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'id_atk'       => [
                'type'       => 'INT',
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
        $this->forge->addKey('id_det_permintaan', true);
        $this->forge->createTable('tbl_det_permintaan');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_det_permintaan');
    }
}
