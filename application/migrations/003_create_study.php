<?php defined('BASEPATH') OR exit('No direct script access allowed');

// Clase para la creacion de las tablas de Estudios
class Migration_create_study extends CI_Migration {
	// Método para crear la tabla 
	public function up(){
		// Agrega los elementos que irán en la tabla
    $this->dbforge->add_field(array(
				// Caracteristicas del Identificador
				'Id' => array(
				'type' => 'INT',
				'constraint' => 12,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			// Caracteristicas del Nombre del Estudio
			'Estudio' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => TRUE
			),
			// Caracteristicas del Tipo de Estudio
			'Tipo' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => TRUE
			),
			// Caracteristicas del Encuestador
			'Encuestador' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => TRUE
			),
			// Caracteristicas del Analista
			'Analista' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => TRUE
			),
		));
		$this->dbforge->add_key('Id', TRUE); // llave primaria de la tabla
		$this->dbforge->create_table('ESTUDIOS'); // Se crea la tabla ESTUDIOS
	}
	
	// Método para eliminar la tabla
	public function down(){
		$this->dbforge->drop_table('ESTUDIOS'); // Se borra la tabla ESTUDIOS
	}
}