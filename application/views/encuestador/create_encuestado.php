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
					<?php foreach($dataedad as $item): ?>
						<option <?= set_value('edad') == '<?= $item ?>' ? 'selected' : ''; ?> value="<?= $item ?>"><?= $item ?></option>
					<?php endforeach; ?>
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
					<?php foreach($dataschool as $item): ?>
    				<option <?= set_value('school') == '<?= $item ?>' ? 'selected' : ''; ?> value="<?= $item ?>"><?= $item ?></option>
					<?php endforeach; ?>
        </select>
				<div class="text-danger"><?= form_error('school') ?></div>
			</div>
			<!-- Atributos para el Genero -->
			<div class="col">
				<label for="">Rango de Ingresos*</label>
				<!-- Custom Select con las opciones -->
        <select name="money" class="custom-select">
        	<option selected value="">Seleccione el Rango de Ingresos</option>
					<?php foreach($datamoney as $item): ?>
    				<option <?= set_value('money') == '<?= $item ?>' ? 'selected' : ''; ?> value="<?= $item ?>"><?= $item ?></option>
					<?php endforeach; ?>
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
		</div>
	</div>
	<!-- Boton para el Agregar Todos los Datos -->
  <div class="form-group">
    <input type="submit" class="btn btn-success" value="Comenzar la Encuesta">
  </div>
</form>
