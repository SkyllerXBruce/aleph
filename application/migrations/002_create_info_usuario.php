<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_info_usuario extends CI_Migration {

    public function up(){    
        $this->dbforge->add_field(array(
            'Id' => array(
                'type' => 'INT',
                'constraint' => 12,
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
            ),
            'Nombres' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => TRUE
            ),
            'Apellidos' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => TRUE
            ),
            'Edad' => array(
                'type' => 'INT',
                'constraint' => 2,
                'null' => TRUE
            ),
            'Matricula' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => TRUE
            ),
            'Especialidad' => array(
                'type' => 'VARCHAR',
                'constraint' => '150',
                'null' => TRUE
            ),
            'Id_Usuario' => array(
                'type' => 'INT',
                'constraint' => 12,
                'unsigned' => TRUE,
            )   
        ));
        $this->dbforge->add_key('Id', TRUE);
        $this->dbforge->create_table('INFO_USUARIOS');
    }

    public function down(){
        $this->dbforge->drop_table('INFO_USUARIOS');
    }
}
