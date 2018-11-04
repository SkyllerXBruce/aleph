<?php
if(!function_exists('getCreateUserRules')){
    function getCreateUserRules(){
        return array(
            array(
                'field' => 'user',
                'label' => 'Usuario',
                'rules' => 'required|max_length[100]',
                'errors' => array(
                    'required' => 'El %s es requerido.',
                    'max_length' => 'El %s es demaciado grande'
                )
            ),
            array(
                'field' => 'correo',
                'label' => 'Correo',
                'rules' => 'required|valid_email|is_unique[USUARIOS.Correo]"',
                'errors' => array(
                    'required' => 'El %s es requerido.',
                    'valid_email' => 'El %s tiene que contener una direccion valida',
                    'is_unique' => 'El %s ya está ocupado.'
                )
            ),
            array(
                'field' => 'rol',
                'label' => 'Rol',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'El %s es requerido.',
                )
            ),
            array(
                'field' => 'name',
                'label' => 'Nombre',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'El %s es requerido.',
                )
            ),
            array(
                'field' => 'lastname',
                'label' => 'Apellidos',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'Sus %s son requeridos.',
                )
            ),
            array(
                'field' => 'esp',
                'label' => 'Especialidad',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'El %s es requerida.',
                )
            ),
            array(
                'field' => 'edad',
                'label' => 'Edad',
                'rules' => 'required|is_natural_no_zero',
                'errors' => array(
                    'required' => 'La %s es requerida.',
                    'is_natural_no_zero' => 'La %s no es Valida.'
                )
            ),
            array(
                'field' => 'matricula',
                'label' => 'Matricula',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'La %s es requerida.',
                )
            ),
        );
    }
}