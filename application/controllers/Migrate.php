<?php

// Clase Migrate para las Migraciones
class Migrate extends CI_Controller{

        // Este index no carga una vista, si no que sirve para cargar las tablas de la Bases de Datos
         public function index() {
                 // Carga la Biblioteca migration
                $this->load->library('migration');
                // Si no encuentra la migracion seleccionada manda un Error 
                if ($this->migration->current() === FALSE) {
                        show_error($this->migration->error_string());
                }
        }
}