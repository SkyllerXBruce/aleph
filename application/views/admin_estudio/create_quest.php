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
				<!-- Atributos para la lista de Reactivos -->
      			<h5>Lista de Reactivos*</h5>
				<ul class="list-group list-group-flush">
					<!-- Ciclo de Opciones de Reactivos con sus aributos -->
					<?php foreach($data as $item): ?>
						<li class="list-group-item">
							<label><input type="checkbox" value="<?= set_value('opcion[]') ?>" name="opcion[]"/><?= $item->Nombre_Reactivo ?></label>
						</li>
					<?php endforeach; ?>
					<li class="list-group-item">
						<label><input type="checkbox" value="algo" name="opcion[]"> Algo</label>
					</li>
					<!-- Atributos del Boton Alta de Reactivos -->	
					<li class="list-group-item">
						<a class="btn btn-outline-secondary" href="<?= base_url('studies/createReagents') ?>" role="button">Agregar un Reactivo</a>
					</li>
					<div class="text-danger"><?= form_error('opcion[]') ?></div>
				</u>
			</div>
    	</div>
	</div>
	<br>
	<!-- Boton para el Agregar Todos los Datos Ingresados -->
    <div class="form-group">
       	<input type="submit" class="btn btn-primary" value="Dar de Alta Cuestionario">
    </div>
</form>