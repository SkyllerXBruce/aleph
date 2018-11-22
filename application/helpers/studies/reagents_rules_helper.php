<?php
// Verifica si la Funcion del helper existe 
if(!function_exists('getReagentsRules')){
	// Funcion que regresa las reglas que van a tener los datos ingresados del formulario Login
	function getReagentsRules(){
		return array(
			array(
				'field' => 'reac', // Nombre del Identificador 
				'label' => 'Nombre del Reactivo', // nombre de la etiqueta 
				'rules' => 'required|max_length[100]', // reglas separadas por un pipe |
				'errors' => array(
					'required' => 'El %s es requerido.', // manda error si no hay datos encontrados
					'max_length' => 'El %s es demaciado grande' // // manda error si el campo usuario sobrepasa 100 caracteres
				)
			),
			array(
				'field' => 'quest', // Nombre del Identificador 
				'label' => 'Cuestionario', // nombre de la etiqueta 
				'rules' => 'required', // reglas separadas por un pipe |
				'errors' => array(
					'required' => 'El %s es requerido, En caso de no haber Agregue uno Por favor.', // manda error si no hay datos encontrados
				)
			),
			array(
				'field' => 'tipo', // Nombre del Identificador 
				'label' => 'Tipo de Reactivo', // nombre de la etiqueta 
				'rules' => 'required', // reglas separadas por un pipe |
				'errors' => array(
					'required' => 'El %s es requerido.', // manda error si no hay datos encontrados
				)
			),
    );
  }
}