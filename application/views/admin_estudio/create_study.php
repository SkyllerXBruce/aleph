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
      <div class="col">
      	<label for="">Nombre Del Estudio</label>
      	<input type="text" name="nombre_estudio" class="form-control" placeholder="Inserte nombre del estudio" value="<?= set_value('nombre_estudio') ?>">
				<div class="text-danger"><?= form_error('nombre_estudio') ?></div>
			</div>
			<!-- Atributos para el Tipo de Estudio -->
      <div class="col">
      	<label for="">Tipo de Estudio</label>
      	<input type="text" name="tipo" class="form-control" placeholder="Inserte el Tipo de Estudio" value="<?= set_value('tipo') ?>">
				<div class="text-danger"><?= form_error('tipo') ?></div>
			</div>
		</div>
		<br>
		<div class="form-row">
			<!-- Atributos para Asignar el Encuestador -->
			<div class="col">
				<label for="">Asignar uno o varios Encuestadores</label>
				<ul class="list-group list-group-flush">
					<?php foreach($dataencuestador as $item): ?>
						<li class="list-group-item">
							<label>
								<input type="checkbox" name="encuestador[]" <?= set_value('encuestador[]') == $item->Nombre_Usuario ? 'checked' : ''; ?> value="<?= $item->Nombre_Usuario ?>"> <?= $item->Nombre_Usuario ?>
							</label>
						</li>
					<?php endforeach; ?>
				</ul>
				<div class="text-danger"><?= form_error('encuestador[]') ?></div>
    	</div>
			<!-- Atributos para Asignar el Analista -->
			<div class="col">
				<label for="">Asignar uno o varios Analistas</label>
				<ul class="list-group list-group-flush">
					<?php foreach($dataanalista as $item): ?>
						<li class="list-group-item">
							<label>
								<input type="checkbox" name="analista[]" <?= set_value('analista[]') == $item->Nombre_Usuario ? 'checked' : ''; ?> value="<?= $item->Nombre_Usuario ?>"> <?= $item->Nombre_Usuario ?>
							</label>
						</li>
					<?php endforeach; ?>
				</ul>
				<div class="text-danger"><?= form_error('analista[]') ?></div>
    	</div>
		</div>
	</div>
	<br>
	<br>
	<!-- Boton para el Agregar Todos los Datos -->
  <div class="form-group">
		<input type="submit" class="btn btn-primary" value="Dar de Alta Estudio">
  </div>
</form>