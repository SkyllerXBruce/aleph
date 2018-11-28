<?php
// Verifica si la Funcion del helper existe 
if(!function_exists('getEncuestadoRules')){
  // Funcion que regresa las reglas que van a tener los datos ingresados del formulario Create Users
	function getEncuestadoRules(){
    return array(
			array(
				'field' => 'name', // Nombre del Identificador 
				'label' => 'Nombre del Encuestado', // nombre de la etiqueta 
        'rules' => 'max_length[100]', // reglas separadas por un pipe |
        'errors' => array(
					'max_length' => 'El %s es demaciado grande' // // manda error si el campo usuario sobrepasa 100 caracteres
				)
			),
			array(
				'field' => 'local', // Nombre del Identificador 
				'label' => 'Localidad', // nombre de la etiqueta 
        'rules' => 'required|max_length[150]', // reglas separadas por un pipe |
        'errors' => array(
					'required' => 'La %s es requerida.', // manda error si no hay datos encontrados
					'max_length' => 'La %s es demaciado grande' // // manda error si el campo usuario sobrepasa 100 caracteres
				)
			),
			array(
				'field' => 'edad',
				'label' => 'Rango de Edad',
				'rules' => 'required',
				'errors' => array(
						'required' => 'El %s es requerido.', // manda error si no hay datos encontrados
				)
			),
			array(
				'field' => 'gen',
				'label' => 'Genero',
				'rules' => 'required',
				'errors' => array(
						'required' => 'El %s es requerido.', // manda error si no hay datos encontrados
				)
			),
			array(
				'field' => 'money',
				'label' => 'Rango de Ingresos',
				'rules' => 'required',
				'errors' => array(
						'required' => 'El %s es requerido.', // manda error si no hay datos encontrados
				)
			),
			array(
				'field' => 'adicional', // Nombre del Identificador 
				'label' => 'Información Adicional', // nombre de la etiqueta 
        'rules' => 'max_length[250]', // reglas separadas por un pipe |
        'errors' => array(
					'max_length' => 'La %s es demaciado grande' // // manda error si el campo usuario sobrepasa 100 caracteres
				)
			),
			array(
				'field' => 'study',
				'label' => 'Estudio',
				'rules' => 'required',
				'errors' => array(
						'required' => 'El %s es requerido.', // manda error si no hay datos encontrados
				)
			),
			array(
				'field' => 'quest',
				'label' => 'Cuestionario',
				'rules' => 'required',
				'errors' => array(
						'required' => 'El %s es requerido.', // manda error si no hay datos encontrados
				)
			),
    );
  }
}