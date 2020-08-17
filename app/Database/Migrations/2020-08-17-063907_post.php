<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Post extends Migration
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
            'title'         => [
                'type'              => 'VARCHAR',
                'constraint'        => '100',
            ],
            'slug'         => [
                'type'              => 'VARCHAR',
                'constraint'        => '100',
            ],
            'text'         => [
                'type'              => 'VARCHAR',
                'constraint'        => '600',
            ],
            'category_id'         => [
                'type'              => 'BIGINT',
                'constraint'        => 20,
            ],
            'author_id'         => [
                'type'              => 'BIGINT',
                'constraint'        => 20,
            ]
        ]);
        $this->forge->addKey('id', TRUE);
       // $this->forge->addForeignKey('category_id','category', 'id');
       // $this->forge->addForeignKey('author_id','author','id');
        $this->forge->createTable('post');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
