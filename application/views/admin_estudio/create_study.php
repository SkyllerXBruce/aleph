<!-- Formulario Alta de Estudios -->
<!-- Se agrega el metodo para mandar los datos -->
<form action="<?= base_url('studies/addStudy') ?>" method="POST">
	<!-- Titulo de Datos del Estudio -->
	<h3>Datos del Estudio</h3>
	<hr>
	<!-- formamos un grupo de elementos -->
	<div class="form-group">
		<!-- Fila de Datos Principales del Estudio -->
    <div class="form-row">
			<!-- Atributos para el Nombre del Estudio -->
      <div class="col-4">
      	<label for="">Nombre Del Estudio</label>
      	<input type="text" name="nombre_estudio" class="form-control" placeholder="Inserte nombre del estudio" value="<?= set_value('nombre_estudio') ?>">
				<div class="text-danger"><?= form_error('nombre_estudio') ?></div>
			</div>
			<!-- Atributos para el Tipo de Estudio -->
      <div class="col-4">
      	<label for="">Tipo de Estudio</label>
      	<input type="text" name="tipo" class="form-control" placeholder="Inserte el Tipo de Estudio" value="<?= set_value('tipo') ?>">
				<div class="text-danger"><?= form_error('tipo') ?></div>
			</div>
			<!-- Atributos para Asignar el Encuestador -->
      <div class="col">
				<label for="">Encuestador Asignado</label>
				<!-- Custom Select con las opciones -->
        <select name="encuestador" class="custom-select">
        	<option selected value="">Seleccione el Encuestador</option>
					<?php foreach($dataencuestador as $item): ?>
						<option <?= set_value('encuestador') == $item->Nombre_Usuario ? 'selected' : ''; ?> value="<?= $item->Nombre_Usuario ?>"><?= $item->Nombre_Usuario ?></option>
					<?php endforeach; ?>
        </select>
			<div class="text-danger"><?= form_error('encuestador') ?></div>
    </div>
		<!-- Atributos para Asignar el Encuestador -->
		<div class="col">
				<label for="">Analista Asignado</label>
				<!-- Custom Select con las opciones -->
        <select name="analista" class="custom-select">
        	<option selected value="">Seleccione el Encuestador</option>
					<?php foreach($dataanalista as $item): ?>
						<option <?= set_value('analista') == $item->Nombre_Usuario ? 'selected' : ''; ?> value="<?= $item->Nombre_Usuario ?>"><?= $item->Nombre_Usuario ?></option>
					<?php endforeach; ?>
        </select>
			<div class="text-danger"><?= form_error('analista') ?></div>
    </div>
	</div>
	<br>
	<br>
	<!-- Boton para el Agregar Todos los Datos -->
  <div class="form-group">
		<input type="submit" class="btn btn-primary" value="Dar de Alta Estudio">
  </div>
</form>