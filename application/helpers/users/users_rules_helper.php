<?php
// Verifica si la Funcion del helper existe 
if(!function_exists('getCreateUserRules')){
    // Funcion que regresa las reglas que van a tener los datos ingresados del formulario Create Users
    function getCreateUserRules(){
        return array(
            array(
                'field' => 'user', // Nombre del Identificador 
                'label' => 'Usuario', // nombre de la etiqueta 
                'rules' => 'required|max_length[100]', // reglas separadas por un pipe |
                'errors' => array(
                    'required' => 'El %s es requerido.', // manda error si no hay datos encontrados
                    'max_length' => 'El %s es demaciado grande' // // manda error si el campo usuario sobrepasa 100 caracteres
                )
            ),
            array(
                'field' => 'correo',
                'label' => 'Correo',
                'rules' => 'required|valid_email|is_unique[USUARIOS.Correo]"',
                'errors' => array(
                    'required' => 'El %s es requerido.', // manda error si no hay datos encontrados
                    'valid_email' => 'El %s tiene que contener una direccion valida', //manda error si el formato de email no es valido
                    'is_unique' => 'El %s ya está ocupado.' // manda error si el correo ya esta en alguno de los usuarios registrados
                )
            ),
            array(
                'field' => 'rol',
                'label' => 'Rol',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'El %s es requerido.', // manda error si no hay datos encontrados
                )
            ),
            array(
                'field' => 'name',
                'label' => 'Nombre',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'El %s es requerido.', // manda error si no hay datos encontrados
                )
            ),
            array(
                'field' => 'lastname',
                'label' => 'Apellidos',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'Sus %s son requeridos.', // manda error si no hay datos encontrados
                )
            ),
            array(
                'field' => 'edad',
                'label' => 'Edad',
                'rules' => 'required|is_natural_no_zero',
                'errors' => array(
                    'required' => 'La %s es requerida.', // manda error si no hay datos encontrados
                    'is_natural_no_zero' => 'La %s no es Valida.' // manda error si el dato no es un numero natural
                )
            ),
            array(
                'field' => 'dir',
                'label' => 'Direccion',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'La %s es requerida.', // manda error si no hay datos encontrados
                )
            ),
            array(
                'field' => 'tel',
                'label' => 'Telefono',
                'rules' => 'required|is_natural_no_zero',
                'errors' => array(
                    'required' => 'El %s es requerido.', // manda error si no hay datos encontrados
                    'is_natural_no_zero' => 'El %s no es Valido.' // manda error si el dato no es un numero natural
                )
            ),
            array(
                'field' => 'matricula',
                'label' => 'Matricula',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'La %s es requerida.', // manda error si no hay datos encontrados
                )
            ),
        );
    }
}