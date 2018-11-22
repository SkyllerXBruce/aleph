<!-- Formulario Alta de Reactivos -->
<!-- Se agrega el metodo para mandar los datos -->
<form action="<?= base_url('studies/addReagents') ?>" method="POST">
	<!-- Titulo de Datos del Reactivo -->
	<h3>Alta de Reactivo</h3>
	<p class="text-right">Datos que son Requeridos (*)</p>
	<hr>
	<!-- formamos un grupo de elementos -->
	<div class="form-group">
		<!-- Fila de Datos de Contenido -->
    <div class="form-row">
      <div class="col">
				<!-- Atributos para el Titulo del Reactivo -->
				<div class="col">
					<label for="">Reactivo*</label>
					<input type="text" name="reac" class="form-control" placeholder="Inserte titulo del Reactivo" value="<?= set_value('reac') ?>">
					<div class="text-danger"><?= form_error('reac') ?></div>
				</div>
				<br>
				<!-- Atributos para Asignar el Cuestionario -->
				<div class="col">
					<label for="">Cuestionario Asignado</label>
					<!-- Custom Select con las opciones -->
      		<select name="quest" class="custom-select">
        		<option selected value="">Seleccione el Cuestionario</option>
						<?php foreach($dataquest as $item): ?>
							<option <?= set_value('quest') == $item->Nombre_Cuestionario ? 'selected' : ''; ?> value="<?= $item->IdCuestionario ?>"><?= $item->Nombre_Cuestionario ?></option>
						<?php endforeach; ?>
      		</select>
					<div class="text-danger"><?= form_error('quest') ?></div>
    		</div>
			<div class="col-6">
				<!-- Atributos para la lista de Reactivos -->
      	<h5>Tipo de Reactivo*</h5>
				<!-- Atributos para el Titulo del Reactivo -->
				<div class="col">
					<label for="">Reactivo*</label>
					<input type="text" name="tipo" class="form-control" placeholder="Inserte titulo del Reactivo" value="<?= set_value('tipo') ?>">
					<div class="text-danger"><?= form_error('tipo') ?></div>
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