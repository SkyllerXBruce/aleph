<?php
// Varifica si la Funcion del helper existe 
if(!function_exists('getLoginRules')){
	// Funcion que regresa las reglas que van a tener los datos ingresados del formulario Login
	function getLoginRules(){
		return array(
			array( 
				'field' => 'email',	// Nombre del Identificador 
        'label' => 'Correo Electrónico', // nombre de la etiqueta 
        'rules' => 'required|valid_email', // reglas separadas por un pipe |
        'errors' => array(
					'required' => 'El %s es requerido.', // manda error si no hay datos encontrados
					'valid_email' => 'El formato de %s es invalido.' //mnda error si el formato de email no es valido
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