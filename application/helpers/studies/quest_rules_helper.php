<?php
// Verifica si la Funcion del helper existe 
if(!function_exists('getQuestRules')){
	// Funcion que regresa las reglas que van a tener los datos ingresados del formulario Login
	function getQuestRules(){
		return array(
			array(
				'field' => 'quest', // Nombre del Identificador 
				'label' => 'Cuestionario', // nombre de la etiqueta 
				'rules' => 'required|max_length[100]', // reglas separadas por un pipe |
				'errors' => array(
					'required' => 'El %s es requerido.', // manda error si no hay datos encontrados
					'max_length' => 'El %s es demaciado grande' // manda error si el campo usuario sobrepasa 100 caracteres
				)
			),
			array(
				'field' => 'desc', // Nombre del Identificador 
				'label' => 'Descripción', // nombre de la etiqueta 
				'rules' => 'max_length[250]', // reglas separadas por un pipe |
				'errors' => array(
					'max_length' => 'La %s es demaciado grande' // manda error si el campo usuario sobrepasa 100 caracteres
				)
			),
			array(
				'field' => 'opcion[]', // Nombre del Identificador 
				'label' => 'Opcion', // nombre de la etiqueta 
				'rules' => 'required', // reglas separadas por un pipe |
				'errors' => array(
					'required' => 'Selecciona una %s, En Caso de no haber Reactivos Agregue uno Por favor.', // manda error si no hay datos encontrados
				)
			),
    );
  }
}