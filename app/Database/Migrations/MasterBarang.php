<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MasterBarang extends Migration
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
			'nama_barang'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'stok_awal' => [
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
		$this->forge->createTable('master_barang');
	}

	public function down()
	{
		$this->forge->dropTable('master_barang');
	}
}
