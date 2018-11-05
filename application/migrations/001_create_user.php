<?php defined('BASEPATH') OR exit('No direct script access allowed');
// Clase para la creacion de las tablas de usuarios
class Migration_create_user extends CI_Migration {
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
                        // Caracteristicas del Nombre del Usuario
                        'Nombre_Usuario' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ),
                        // Caracteristicas del Correo
                        'Correo' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ),
                        // Caracteristicas del contraseña
                        'Contrasena' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ),
                        // Caracteristicas del status del usuario
                        'Status' => array(
                                'type' => 'ENUM("En linea","Desconectado")',
                                'null' => TRUE
                        ),
                        // Caracteristicas del Rol que el Usuario va Desempeñar 
                        'Rol' => array(
                                'type' => 'ENUM("Administrador de Sistema","Administrador de Estudio","Encuestador","Analista")',
                                'null' => TRUE
                        )
                ));
                $this->dbforge->add_key('Id', TRUE); // llave primaria de la tabla
                $this->dbforge->create_table('USUARIOS'); // Se crea la tabla USUARIOS
        }

        // Método para eliminar la tabla
        public function down(){
                $this->dbforge->drop_table('USUARIOS'); // Se borra la tabla USUARIOS
        }
}