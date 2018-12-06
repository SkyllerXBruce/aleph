<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

// Controlador User para creacion, eliminacion y modificacion de usuarios
class Analista extends CI_Controller {
  // Constructor de User
	public function __construct(){
		parent::__construct(); // Constructor padre de CI_Controller
		// Cargamos Bibliotecas, Helpers y Modelos a Usar
		$this->load->library(array('form_validation','excel'));
		$this->load->model(array('Encuestados','Analiza'));
	}

	// Método index para Cagar vista de Show Users
	public function index(){
		$data = $this->getListQuest();
		$vista = $this->load->view('analista/show_encuestas',array('data' => $data),TRUE);
		$links = $this->load->view('layout/aside_analista','',TRUE); // Barra lateral de navegacion
		$this->getTemplate($vista,$links); // Carga el Template con la vista correspondiente
	}

	public function detalles($idquest)	{
		$data = $this->getDetalleStudy($idquest);
		$questdone = $this->Encuestados->buscarQuestDonePorIdcuestionario($idquest);
		$vista = $this->load->view('analista/detalles_encuesta',array('data' => $data,'questdone' => $questdone),TRUE);
		$links = $this->load->view('layout/aside_analista','',TRUE); // Barra lateral de navegacion
		$this->getTemplate($vista,$links); // Carga el Template con la vista correspondiente
	}

	public function encuesta($idquestdone,$encuesta,$idquest){
		$encuesta = str_replace("%20", " ", $encuesta);
		$dataencuesta = $this->getEncuesta($idquestdone);
		$vista = $this->load->view('analista/analiza_encuesta',array(
			'data' => $dataencuesta, 'encuesta' => $encuesta, 'idquest' => $idquest),TRUE);
		$links = $this->load->view('layout/aside_analista','',TRUE); // Barra lateral de navegacion
		$this->getTemplate($vista,$links); // Carga el Template con la vista correspondiente
	}

	public function download(){
		$study = $this->Encuestados->getStudies();
		$questdone = array();
		$vista = $this->load->view('analista/download_encuesta',array('datastudy' => $study,'questdone' => $questdone),TRUE);
		$links = $this->load->view('layout/aside_analista','',TRUE); // Barra lateral de navegacion
		$this->getTemplate($vista,$links); // Carga el Template con la vista correspondiente
	}

	public function excelDownload($idquestdone){
		$questdone = $this->Analiza->buscarQuestDonePorId($idquestdone);
		$study = $this->Encuestados->buscarStudyPorId($questdone[0]->IdEstudio);
		$user = $this->Analiza->buscarUserPorId($questdone[0]->IdUsuarios);
		$quest = $this->Encuestados->buscarQuestPorIdcuestionario($questdone[0]->IdCuestionario);
		$dataencuesta = $this->getEncuesta($idquestdone);
    $this->excel->setActiveSheetIndex(0);
    $this->excel->getActiveSheet()->setTitle('Encuesta');
    //Le aplicamos ancho las columnas.
    $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(50);
    $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(100);
    //Le aplicamos negrita a los títulos de la cabecera.
		$this->excel->getActiveSheet()->getStyle("A1")->getFont()->setBold(true);
		$this->excel->getActiveSheet()->getStyle("A2")->getFont()->setBold(true);
		$this->excel->getActiveSheet()->getStyle("A3")->getFont()->setBold(true);
		$this->excel->getActiveSheet()->getStyle("A4")->getFont()->setBold(true);
		$this->excel->getActiveSheet()->getStyle("A6")->getFont()->setBold(true);
		$this->excel->getActiveSheet()->getStyle("B6")->getFont()->setBold(true);
		// ponemos el color de las celdas
		$this->cellColor('A1:A4','BE81F7');
		$this->cellColor('B1:B4','FFFFFF');
		$this->cellColor('A5:B5','FFFFFF');
		$this->cellColor('A6:B6','A4A4A4');
    //Definimos los títulos de la cabecera.
    $this->excel->getActiveSheet()->setCellValue("A1", 'Estudio: '.$study[0]->Estudio);
    $this->excel->getActiveSheet()->setCellValue("A2", 'Cuestionario: '.$quest[0]->Nombre_Cuestionario);
		$this->excel->getActiveSheet()->setCellValue("A3", 'Encuestador: '.$user[0]->Nombre_Usuario);
		$this->excel->getActiveSheet()->setCellValue("A4", 'Encuestado: '.$questdone[0]->Nombre_Encuestado);
		$this->excel->getActiveSheet()->setCellValue("A6", 'Preguntas');
		$this->excel->getActiveSheet()->setCellValue("B6", 'Respuestas');
		// Contador de filas
		$contador = 6;
    //Definimos la data del cuerpo.        
    foreach($dataencuesta as $encuesta){
    	//Incrementamos una fila más, para ir a la siguiente.
      $contador++;
			//Informacion de las filas de la consulta.
			$this->cellColor('A'.$contador.':B'.$contador.'','FFFFFF');
      $this->excel->getActiveSheet()->setCellValue("A{$contador}", $encuesta['reagent']);
      $this->excel->getActiveSheet()->setCellValue("B{$contador}", $encuesta['respuesta']);
  	}
    //Le ponemos un nombre al archivo que se va a generar.
    $archivo = "{$study[0]->Estudio}-{$quest[0]->Nombre_Cuestionario}-{$user[0]->Nombre_Usuario}-{$questdone[0]->Nombre_Encuestado}.xls";
    header('Content-Type: application/vnd.ms-excel; charset=utf-8');
		header('Content-Disposition: attachment;filename="'.$archivo.'"; charset=utf-8');
    header('Cache-Control: max-age=0');
    $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
    //Hacemos una salida al navegador con el archivo Excel.
		$objWriter->save('php://output');
	}

	function cellColor($cells,$color){
    $this->excel->getActiveSheet()->getStyle($cells)->getFill()->applyFromArray(array(
			'type' => PHPExcel_Style_Fill::FILL_SOLID,'startcolor' => array('rgb' => $color)));
	}

	public function getListQuest(){
		$idstudy = $this->Encuestados->buscarIdStudyPorIdUser($this->session->userdata('id'));
		$data = array();
		foreach ($idstudy as $i) {
			$quest = $this->Encuestados->buscarQuestPorIdEstudio($i->IdEstudio);
			$study = $this->Encuestados->buscarStudyPorId($i->IdEstudio);
			foreach ($quest as $j) {
				array_push($data,array(
					'study' => $study[0]->Estudio,
					'asignadoe' => $study[0]->Encuestador,
          'asignadoa' => $study[0]->Analista,
          'idquest' => $j->IdCuestionario,
					'quest' => $j->Nombre_Cuestionario)
				);
			}
		}
		return $data;
	}

	public function getDetalleStudy($idquest){
		$quest = $this->Encuestados->buscarQuestPorIdcuestionario($idquest);
		$study = $this->Encuestados->buscarStudyPorId($quest[0]->IdEstudio);
		$data = array(
			'user' => $this->session->userdata('nombre_usuario'),
			'study' => $study[0]->Estudio,
			'typestudy' => $study[0]->Tipo,
			'asignadoe' => $study[0]->Encuestador,
			'asignadoa' => $study[0]->Analista,
			'idquest' => $quest[0]->IdCuestionario,
			'quest' => $quest[0]->Nombre_Cuestionario,
			'desc' => $quest[0]->Descripcion
		);
		return $data;
	}

	public function getEncuesta($idquestdone){
		$data = array();
		$idrespcampo = $this->Analiza->buscarRespuestaCampoPorIdQuestDone($idquestdone);
		foreach ($idrespcampo as $i) {
			$resp = $this->Analiza->buscarRespuestaPorId($i->IdRespuesta);
			$reagent = $this->Analiza->buscarReagentsPorId($resp[0]->IdReactivo);
			array_push($data,array(
				'reagent' => $reagent[0]->Nombre_Reactivo,
				'respuesta' => $resp[0]->Respuesta
				)
			);
		}
		return $data;
	}

	public function getQuest(){
		$idstudy = $this->input->post('study');
		if ($idstudy){
			$quest = $this->Encuestados->buscarQuestPorIdEstudio($idstudy);
			echo '<option value="">Selecciona Cuestionario</option>';
			foreach ($quest as $item) {
				echo '<option value="'.$item->IdCuestionario.'">'.$item->Nombre_Cuestionario.'</option>';
			}
		}else{
			echo '<option value="">Selecciona Cuestionario</option>';
		}
	}

	public function getEncuestados(){
		$idquest = $this->input->post('quest');
		if ($idquest){
			$encuestado = $this->Encuestados->buscarQuestDonePorIdcuestionario($idquest);
			echo '<thead class="thead-dark">';
				echo '<tr>';
					echo '<th scope="col">Nombre</th>';
					echo '<th scope="col">Genero</th>';
					echo '<th scope="col">Rango de Edad</th>';
					echo '<th scope="col">Localidad</th>';
					echo '<th scope="col">Escolaridad</th>';
					echo '<th scope="col">Rango de Ingresos</th>';
					echo '<th scope="col">Fecha de Realización</th>';
					echo '<th scope="col">Información Adicional</th>';
					echo '<th scope="col">Descargar Encuesta</th>';
				echo '</tr>';
			echo '</thead>';
			foreach ($encuestado as $item) {
				echo '<tr>';
					echo '<th>'.$item->Nombre_Encuestado.'</th>';
					echo '<td>'.$item->Genero.'</td>';
					echo '<td>'.$item->Rango_Edad.'</td>';
					echo '<td>'.$item->Localidad.'</td>';
					echo '<td>'.$item->Escolaridad.'</td>';
					echo '<td>'.$item->Rango_Ingresos.'</td>';
					echo '<td>'.$item->Fecha_Relizado.'</td>';
					echo '<td>'.$item->Info_Adicional.'</td>';
					echo '<td><a class="btn btn-secondary" href="'.base_url('analista/excelDownload/'.$item->IdCuestionarioContestado).'" role="button">Descargar</a></td>';
				echo '</tr>';
			}
		}else {
			echo '<thead class="thead-dark">';
				echo '<tr>';
					echo '<th scope="col">Nombre</th>';
					echo '<th scope="col">Genero</th>';
					echo '<th scope="col">Rango de Edad</th>';
					echo '<th scope="col">Localidad</th>';
					echo '<th scope="col">Escolaridad</th>';
					echo '<th scope="col">Rango de Ingresos</th>';
					echo '<th scope="col">Fecha de Realización</th>';
					echo '<th scope="col">Información Adicional</th>';
					echo '<th scope="col">Descargar Encuesta</th>';
				echo '</tr>';
			echo '</thead>';
		}	
	}

	// Método Template que Carga todos los elemento de las Vistas
	public function getTemplate($view,$links){
		$data['title'] = 'Analista'; // titulo del Encabezado
		// Partes de la vista 
		$data = array(
				'head' => $this->load->view('layout/head',$data,TRUE), // Encabezado
				'nav' => $this->load->view('layout/nav','',TRUE), // Barra superior de navegacion
				'aside' => $links, // Barra lateral de navegacion
				'content' => $view, // Contenido de la pagina
				'footer' => $this->load->view('layout/footer','',TRUE), // Pie de pagina
		);
		$this->load->view('dashboard',$data); // mandamos todo al Dashboard
	}
}