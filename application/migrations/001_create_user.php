<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_user extends CI_Migration {

        public function up(){
                $this->dbforge->add_field(array(
                        'Id' => array(
                                'type' => 'INT',
                                'constraint' => 12,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'Nombre_Usuario' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ),
                        'Correo' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ),
                        'Contrasena' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                                'null' => TRUE
                        ),
                        'Status' => array(
                                'type' => 'ENUM("En linea","Desconectado")',
                                'null' => TRUE
                        ),
                        'Rol' => array(
                                'type' => 'ENUM("Administrador de Sistema","Administrador de Estudio","Encuestador","Analista")',
                                'null' => TRUE
                        )
                ));
                $this->dbforge->add_key('Id', TRUE);
                $this->dbforge->create_table('USUARIOS');
        }

        public function down(){
                $this->dbforge->drop_table('USUARIOS');
        }
}