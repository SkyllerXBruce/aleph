<!-- Formulario de Datos del Encuestado -->
<!-- Se agrega el metodo para mandar los datos -->
<form action="<?= base_url('encuestador/addEncuestado') ?>" method="POST">
	<!-- Titulo de Datos del Encuestado -->
	<h3>Datos del Encuestado</h3>
	<p class="text-right">Datos que son Requeridos (*)</p>
	<hr>
	<!-- formamos un grupo de elementos -->
	<div class="form-group">
		<!-- Fila de Datos Basicos -->
    <div class="form-row">
			<!-- Atributos para el Nombre del Encuestado -->
      <div class="col-5">
        <label for="">Nombre</label>
        <input type="text" name="name" class="form-control" placeholder="Ingrese Nombre del Encuestado" value="<?= set_value('name') ?>">
				<div class="text-danger"><?= form_error('name') ?></div>
			</div>
			<!-- Atributos para el Rango de Edad -->
      <div class="col">
        <label for="">Rango de Edad*</label>
        <!-- Custom Select con las opciones -->
        <select name="edad" class="custom-select">
        	<option selected value="">Seleccione Rango de Edad</option>
					<option <?= set_value('edad') == '1 - 3 años' ? 'selected' : ''; ?> value="1 - 3 años">1 - 3 años</option>
					<option <?= set_value('edad') == '3 - 5 años' ? 'selected' : ''; ?> value="3 - 5 años">3 - 5 años</option>
					<option <?= set_value('edad') == '5 - 10 años' ? 'selected' : ''; ?> value="5 - 10 años">5 - 10 años</option>
					<option <?= set_value('edad') == '10 - 15 años' ? 'selected' : ''; ?> value="10 - 15 años">10 - 15 años</option>
					<option <?= set_value('edad') == '15 - 20 años' ? 'selected' : ''; ?> value="15 - 20 años">15 - 20 años</option>
					<option <?= set_value('edad') == '20 - 30 años' ? 'selected' : ''; ?> value="20 - 30 años">20 - 30 años</option>
					<option <?= set_value('edad') == '30 - 40 años' ? 'selected' : ''; ?> value="30 - 40 años">30 - 40 años</option>
					<option <?= set_value('edad') == '40 - 50 años' ? 'selected' : ''; ?> value="40 - 50 años">40 - 50 años</option>
					<option <?= set_value('edad') == '50 - 60 años' ? 'selected' : ''; ?> value="50 - 60 años">50 - 60 años</option>
					<option <?= set_value('edad') == '60 - 70 años' ? 'selected' : ''; ?> value="60 - 70 años">60 - 70 años</option>
					<option <?= set_value('edad') == '70 - 80 años' ? 'selected' : ''; ?> value="70 - 80 años">70 - 80 años</option>
					<option <?= set_value('edad') == 'Mas de 80 años' ? 'selected' : ''; ?> value="Mas de 80 años">Mas de 80 años</option>
        </select>
				<div class="text-danger"><?= form_error('edad') ?></div>
			</div>
			<!-- Atributos para el Genero -->
			<div class="col">
				<label for="">Genero*</label>
				<!-- Custom Select con las opciones -->
        <select name="gen" class="custom-select">
        	<option selected value="">Seleccione el Genero</option>
        	<option <?= set_value('gen') == 'Femenino' ? 'selected' : ''; ?> value="Femenino">Femenino</option>
        	<option <?= set_value('gen') == 'Masculino' ? 'selected' : ''; ?> value="Masculino">Masculino</option>
          <option <?= set_value('gen') == 'Indefinido' ? 'selected' : ''; ?> value="Indefinido">Indefinido</option>
        </select>
				<div class="text-danger"><?= form_error('gen') ?></div>
			</div>
		</div>
		<br>
		<!-- Fila de Datos de la Informacion Especializada -->
		<div class="form-row">
			<!-- Atributos para la Localidad -->
      <div class="col-6">
        <label for="">Localidad*</label>
        <input type="text" name="local" class="form-control" placeholder="Ingrese la Localidad" value="<?= set_value('local') ?>">
				<div class="text-danger"><?= form_error('local') ?></div>
  		</div>
			<!-- Atributos para el Genero -->
			<div class="col">
				<label for="">Escolaridad</label>
				<!-- Custom Select con las opciones -->
        <select name="school" class="custom-select">
        	<option selected value="">Seleccione la Escolaridad</option>
    			<option <?= set_value('school') == 'Primaria' ? 'selected' : ''; ?> value="Primaria">Primaria</option>
					<option <?= set_value('school') == 'Secundaria' ? 'selected' : ''; ?> value="Secundaria">Secundaria</option>
					<option <?= set_value('school') == 'Preparatoria' ? 'selected' : ''; ?> value="Preparatoria">Preparatoria</option>
					<option <?= set_value('school') == 'Licenciatura' ? 'selected' : ''; ?> value="Licenciatura">Licenciatura</option>
					<option <?= set_value('school') == 'Maestría' ? 'selected' : ''; ?> value="Maestría">Maestría</option>
					<option <?= set_value('school') == 'Doctorado' ? 'selected' : ''; ?> value="Doctorado">Doctorado</option>
					<option <?= set_value('school') == 'Posgrado' ? 'selected' : ''; ?> value="Posgrado">Posgrado</option>
					<option <?= set_value('school') == 'Ingeniería' ? 'selected' : ''; ?> value="Ingeniería">Ingeniería</option>
        </select>
				<div class="text-danger"><?= form_error('school') ?></div>
			</div>
			<!-- Atributos para el Genero -->
			<div class="col">
				<label for="">Rango de Ingresos*</label>
				<!-- Custom Select con las opciones -->
        <select name="money" class="custom-select">
        	<option selected value="">Seleccione el Rango de Ingresos</option>
					<option <?= set_value('money') == 'Menos de 2,000' ? 'selected' : ''; ?> value="Menos de 2,000">Menos de 2,000</option>
    			<option <?= set_value('money') == '2,000-7,999' ? 'selected' : ''; ?> value="2,000-7,999">2,000-7,999</option>
    			<option <?= set_value('money') == '8,000-15,999' ? 'selected' : ''; ?> value="8,000-15,999">8,000-15,999</option>
    			<option <?= set_value('money') == '16,000-24,999' ? 'selected' : ''; ?> value="16,000-24,999">16,000-24,999</option>
    			<option <?= set_value('money') == '25,000-34,999' ? 'selected' : ''; ?> value="25,000-34,999">25,000-34,999</option>
    			<option <?= set_value('money') == '35,000-49,999' ? 'selected' : ''; ?> value="35,000-49,999">35,000-49,999</option>
    			<option <?= set_value('money') == 'Mas de 50,000' ? 'selected' : ''; ?> value="Mas de 50,000">Mas de 50,000</option>
        </select>
				<div class="text-danger"><?= form_error('money') ?></div>
			</div>
		</div>
		<br>
		<div class="form-row">
			<!-- Atributos para Información Adicional -->
			<div class="col">
				<label for="">Información Adicional</label>
				<textarea class="form-control" name='adicional' rows="5" placeholder="Ingrese Información Adicional" value="<?= set_value('adicional') ?>"></textarea>
				<div class="text-danger"><?= form_error('adicional') ?></div>
			</div>
			<div class="form-col">
				<!-- Atributos para el Estudio -->
				<div class="col">
					<label for="">Estudio*</label>
					<!-- Custom Select con las opciones -->
					<select name="study" class="custom-select" id="idstudy">
						<option selected value="">Seleccione el Estudio</option>
						<?php foreach($datastudy as $item): ?>
							<option value="<?= $item->idEstudio ?>"><?= $item->Estudio ?></option>
						<?php endforeach; ?>
					</select>
					<div class="text-danger"><?= form_error('study') ?></div>
				</div>
				<br/>
				<!-- Atributos para el Cuestionario -->
				<div class="col">
					<label for="">Cuestionario*</label>
					<!-- Custom Select con las opciones -->
					<select name="quest" class="custom-select" id="idquest" disabled="">
						<option selected value="">Seleccione el Cuestionario</option>
					</select>
					<div class="text-danger"><?= form_error('quest') ?></div>
				</div>
			</div>
		</div>
	</div>
	<!-- Boton para el Agregar Todos los Datos -->
  <div class="form-group">
    <input type="submit" class="btn btn-success" value="Comenzar la Encuesta">
  </div>
</form>
<!-- Jquery de la Bibliotecas de Google -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#idstudy').change(function(){
			
			$('#idstudy option:selected').each(function(){
				study =$('#idstudy').val();
				if (study == ''){
					$('#idquest').prop('disabled',true);
				}else {
					$('#idquest').prop('disabled',false);
					$.post("<?= base_url(); ?>encuestador/getQuest",{
						study : study
					}, function(data){
						$('#idquest').html(data);
					});
				}
			});
		});
	});
</script>
