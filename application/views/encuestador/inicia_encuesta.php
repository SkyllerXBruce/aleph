<!-- Formulario de Datos del Encuestado -->
<!-- Se agrega el metodo para mandar los datos -->
<form action="<?= base_url('encuestador/addEncuesta/'.$quest[0]->IdCuestionario) ?>" method="POST">
	<div class="container">
		<!-- Titulo de Datos del Encuestado -->
		<h3>Inicia Encuesta <?= $quest[0]->Nombre_Cuestionario ?></h3>
		<hr>
		<div class="row">
			<div class="col-8">
				<div data-spy="scroll" data-target="#list-example" data-offset="0" class="scrollspy-example">
				<?php foreach($reactivos as $item): ?>
					<h4><?= $item->Nombre_Reactivo ?></h4>
					<input type="text" name="resp[]" class="form-control" placeholder="Ingrese Respuesta" value="<?= set_value('resp[]') ?>">
					<br>
				<?php endforeach; ?>
				</div>
			</div>
		</div>
		<br>
		<br>
		<!-- Boton para el Agregar Todos los Datos -->
		<div class="form-group">
			<input type="submit" class="btn btn-success" value="Terminar Encuesta">
		</div>	
	</div>
</form>