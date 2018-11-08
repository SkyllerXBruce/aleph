<?php
// Verifica si la Funcion del helper existe 
if(!function_exists('getStudyRules')){
	// Funcion que regresa las reglas que van a tener los datos ingresados del formulario Login
	function getStudyRules(){
		return array(
			array(
				'field' => 'nombre_estudio', // Nombre del Identificador 
				'label' => 'Estudio', // nombre de la etiqueta 
				'rules' => 'required|max_length[100]', // reglas separadas por un pipe |
				'errors' => array(
					'required' => 'El %s es requerido.', // manda error si no hay datos encontrados
					'max_length' => 'El %s es demaciado grande' // // manda error si el campo usuario sobrepasa 100 caracteres
				)
			),
			array(
				'field' => 'tipo', // Nombre del Identificador 
				'label' => 'Tipo de Estudio', // nombre de la etiqueta 
				'rules' => 'required|max_length[100]', // reglas separadas por un pipe |
				'errors' => array(
					'required' => 'El %s es requerido.', // manda error si no hay datos encontrados
					'max_length' => 'El %s es demaciado grande' // // manda error si el campo usuario sobrepasa 100 caracteres
				)
			),
			array(
				'field' => 'encuestador',
				'label' => 'Encuestador',
				'rules' => 'required',
				'errors' => array(
						'required' => 'El %s es requerido.', // manda error si no hay datos encontrados
				)
			),
			array(
				'field' => 'analista',
				'label' => 'Analista',
				'rules' => 'required',
				'errors' => array(
						'required' => 'El %s es requerido.', // manda error si no hay datos encontrados
				),
				
			),
    );
  }
}