<?php
// Varifica si la Funcion del helper existe 
if(!function_exists('getLoginRules')){
	// Funcion que regresa las reglas que van a tener los datos ingresados del formulario Login
	function getLoginRules(){
		return array(
			array(
				'field' => 'email',
        'label' => 'Correo Electrónico',
        'rules' => 'required|valid_email',
        'errors' => array(
					'required' => 'El %s es requerido.',
					'valid_email' => 'El formato de %s es invalido.'
					)
        ),
        array(
					'field' => 'password',
          'label' => 'Contraseña',
          'rules' => 'required',
          'errors' => array(
						'required' => 'El %s es requerido.',
					)
				)     
    );
  }
}