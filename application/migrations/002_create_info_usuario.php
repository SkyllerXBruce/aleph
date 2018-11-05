<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// Clase para la creacion de las tablas de la Informacion de los usuarios
class Migration_create_info_usuario extends CI_Migration {
    // Método para crear la tabla
    public function up(){
        // Agrega los elementos que irán en la tabla
        $this->dbforge->add_field(array(
            // Caracteristicas del Identificador
            'Id' => array(
                'type' => 'INT',
                'constraint' => 12,
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
            ),
            // Caracteristicas del Nombre o Nombres del Usuario
            'Nombres' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => TRUE
            ),
            // Caracteristicas de los Apellidos del Usuario
            'Apellidos' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => TRUE
            ),
            // Caracteristicas de la edad del usuario
            'Edad' => array(
                'type' => 'INT',
                'constraint' => 2,
                'null' => TRUE
            ),
            // Caracteristicas de la Matricula del usuario
            'Matricula' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => TRUE
            ),
            // Caracteristicas de la epecialidad del Usuario
            'Especialidad' => array(
                'type' => 'VARCHAR',
                'constraint' => '150',
                'null' => TRUE
            ),
            // Caracteristicas del Identitificador Relacionado a la Tabla USUARIOS 
            'Id_Usuario' => array(
                'type' => 'INT',
                'constraint' => 12,
                'unsigned' => TRUE,
            )   
        ));
        $this->dbforge->add_key('Id', TRUE); // llave primaria de la tabla
        $this->dbforge->create_table('INFO_USUARIOS'); // Se crea la tabla INFO_USUARIOS
    }

    // Método para eliminar la tabla
    public function down(){
        $this->dbforge->drop_table('INFO_USUARIOS');// Se borra la tabla INFO_USUARIOS
    }
}
