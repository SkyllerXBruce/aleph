<!-- Formulario de Datos del Encuestado -->
<!-- Se agrega el metodo para mandar los datos -->
<form action="" method="POST">
	<!-- Titulo de Datos del Encuestado -->
	<h3>Datos del Encuestado</h3>
	<hr>
	<div class="form-row">
		<!-- Atributos para el Estudio -->
		<div class="col">
			<label>Estudio</label>
			<!-- Custom Select con las opciones -->
			<select name="study" class="custom-select" id="idstudy">
				<option selected value="">Seleccione el Estudio</option>
				<?php foreach($datastudy as $item): ?>
					<option value="<?= $item->idEstudio ?>"><?= $item->Estudio ?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<br/>
		<!-- Atributos para el Cuestionario -->
		<div class="col">
			<label>Cuestionario</label>
			<!-- Custom Select con las opciones -->
			<select name="quest" class="custom-select" id="idquest" disabled="">
				<option selected value="">Seleccione el Cuestionario</option>
			</select>
		</div>
	</div>
	<br>
	<table class="table" id="tablaEncuestados">
		<!-- Titulo de las Columnas con Estilo para la Tabla -->
		<thead class="thead-dark">
			<tr>
				<th scope="col">Nombre</th>
				<th scope="col">Genero</th>
				<th scope="col">Rango de Edad</th>
				<th scope="col">Localidad</th>
				<th scope="col">Escolaridad</th>
				<th scope="col">Rango de Ingresos</th>
				<th scope="col">Fecha de Realización</th>
				<th scope="col">Información Adicional</th>
				<th scope="col">Descargar Encuesta</th>
			</tr>
		</thead>
		<!-- Ciclo para Mostrar Cada uno de los Datos -->
		<tbody>
			
		</tbody>
	</table>
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
					$.post("<?= base_url(); ?>analista/getQuest",{
						study : study
					}, function(data){
						$('#idquest').html(data);
					});
				}
			});
		});
		$('#idquest').change(function(){
			$('#idquest option:selected').each(function(){
				quest =$('#idquest').val();
				$.post("<?= base_url(); ?>analista/getEncuestados",{
					quest : quest
				}, function(data){
					$('#tablaEncuestados').html(data);
				});
			});
		});
	});
</script>