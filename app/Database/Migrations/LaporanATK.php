<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class LaporanATK extends Migration
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
			'tanggalLaporan'       => [
				'type'       => 'DATETIME'
			],
			'perihal' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
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
		$this->forge->createTable('laporan_atk');
	}

	public function down()
	{
		$this->forge->dropTable('laporan_atk');
	}
}
