<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AtkKurang extends Migration
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
            'id_det_permintaan'       => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'id_atk' => [
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
        $this->forge->createTable('tbl_atk_kurang');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_atk_kurang');
    }
}
