<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_productos extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field(array(
            'IDPRODUCTO' => array(
                'type' => 'BIGINT',
                'constraint' => 20,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
			),
			'CATEGORIA' => array(
				"type" => "INT",
				"constraint" => 5,
				"unsigned" => TRUE,
				"null" => TRUE,
				'comment' => '1.- CAFÉ, 2.- TÉ, 3.- DESAYUNO, 4.- COMIDA'
			),
			'CLASIFICACION' => array(
				"type" => "TINYINT",
				"constraint" => 3,
				"unsigned" => TRUE,
				"null" => TRUE,
				'comment' => '1.- BEBIDAS, 2.- ALIMENTOS'
			),
			'TITULO' => array(
				"type" => "VARCHAR",
				"constraint" => 80,
				"null" => TRUE
			),
			'PRECIO_C' => array(
				"null" => FALSE,
				"default" => 0.00,
				"type" => 'DECIMAL',
				'unsigned' => FALSE,
				"constraint" => '8,2'
			),
			'PRECIO_M' => array(
				"null" => FALSE,
				"default" => 0.00,
				"type" => 'DECIMAL',
				'unsigned' => FALSE,
				"constraint" => '8,2'
			),
			'PRECIO_G' => array(
				"null" => FALSE,
				"default" => 0.00,
				"type" => 'DECIMAL',
				'unsigned' => FALSE,
				"constraint" => '8,2'
			),
			'CREATED_AT' => array(
				"type" => "TIMESTAMP"
			),
			'UPDATED_AT' => array(
				"type" => "DATETIME",
				"null" => TRUE
			),
		));
		
        $this->dbforge->add_key('IDPRODUCTO', TRUE);
        $this->dbforge->create_table('PRODUCTOS', FALSE, array('ENGINE' => 'InnoDB'));
    }

    public function down()
    {
        $this->dbforge->drop_table('PRODUCTOS');
    }
}