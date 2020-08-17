<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Category extends Migration
{
	public function up()
	{
        $this->forge->addField([
                'id'           => [
                'type'              => 'BIGINT',
                'constraint'        => 20,
                'unsigned'          => TRUE,
                'auto_increment'    => TRUE
            ],
            'category'         => [
                'type'              => 'VARCHAR',
                'constraint'        => '100',
            ],
//            'password'         => [
//                'type'              => 'VARCHAR',
//                'constraint'        => '100',
//            ]
        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('categorys');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
