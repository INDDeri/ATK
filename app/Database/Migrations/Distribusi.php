<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Distribusi extends Migration
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
            'id_permintaan'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'tgl_distribusi' => [
                'type' => 'DATETIME'
            ],
            'id_user'       => [
                'type'       => 'INT',
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
        $this->forge->createTable('tbl_distribusi');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_distribusi');
    }
}
