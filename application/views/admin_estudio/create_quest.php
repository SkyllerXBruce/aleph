<!-- Formulario Alta de Cuestionario -->
<!-- Se agrega el metodo para mandar los datos -->
<form action="<?= base_url('studies/addQuest') ?>" method="POST">
	<!-- Titulo de Datos del Usuario -->
	<h3>Alta de Cuestionario</h3>
	<p class="text-right">Datos que son Requeridos (*)</p>
	<hr>
	<!-- formamos un grupo de elementos -->
	<div class="form-group">
		<!-- Fila de Datos de Contenido -->
    <div class="form-row">
      <div class="col">
				<!-- Atributos para el Titulo del Cuestionario -->
				<div class="col">
					<label for="">Cuestionario*</label>
					<input type="text" name="quest" class="form-control" placeholder="Inserte titulo del Cuestionario" value="<?= set_value('quest') ?>">
					<div class="text-danger"><?= form_error('quest') ?></div>
				</div>
				<br>
				<!-- Atributos para la descripcion del Cuestionario -->
				<div class="col">
					<label for="">Descripción</label>
					<textarea class="form-control" name='desc' rows="4" placeholder="Inserte una Breve Descripción" value="<?= set_value('desc') ?>"></textarea>
					<div class="text-danger"><?= form_error('desc') ?></div>
				</div>				
			</div>
			<div class="col-7">
				<!-- Atributos para Asignar el Estudio -->
				<div class="col">
					<label for="">Estudio Asignado</label>
					<!-- Custom Select con las opciones -->
      		<select name="study" class="custom-select">
        		<option selected value="">Seleccione el Estudio</option>
						<?php foreach($data as $item): ?>
							<option <?= set_value('study') == $item->Estudio ? 'selected' : ''; ?> value="<?= $item->idEstudio ?>"><?= $item->Estudio ?></option>
						<?php endforeach; ?>
      		</select>
					<div class="text-danger"><?= form_error('study') ?></div>
					<br>
					<br>
					<a class="btn btn-outline-secondary" href="<?= base_url('studies/create') ?>" role="button">Agregar un Nuevo Estudio</a>
    		</div>
			</div>
    </div>
	</div>
	<br>
	<!-- Boton para el Agregar Todos los Datos Ingresados -->
    <div class="form-group">
       	<input type="submit" class="btn btn-primary" value="Dar de Alta Cuestionario">
    </div>
</form>