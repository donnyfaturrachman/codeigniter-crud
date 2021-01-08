<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pegawai extends Migration
{
	public function up()
	{
        $this->forge->addField([
	                        'id' => [
	                        	'type'           => 'INT',
	                        	'constraint'     => 11,
	                        	'unsigned'       => true,
	                        	'auto_increment' => true,
	                        ],
	                        'nip' => [
	                        	'type'           => 'VARCHAR',
	                        	'constraint'     => '100',
	                        ],
	                        'name' => [
	                        	'type'           => 'VARCHAR',
	                        	'constraint'     => '255',
	                        ],
			                'email' => [
			                	'type'           => 'VARCHAR',
			                	'constraint'     => '100',
	                        ],
	                        'gender' => [
	                        	'type'           => 'INT',
	                        	'constraint'     => '1',
	                        ],
	                        'hobby' => [
	                        	'type'           => 'INT',
	                        	'constraint'     => '1',
	                        ],
	                        'path' => [
	                        	'type'           => 'TEXT',
	                        	'null'           => true,
	                        ],
		                ]);
		                $this->forge->addKey('id', true);
		                $this->forge->createTable('pegawai');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('pegawai');
	}
}
