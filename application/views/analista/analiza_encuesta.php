<!-- Formulario de Datos del Encuestado -->
<!-- Se agrega el metodo para mandar los datos -->
<form action="<?= base_url('analista/detalles/'.$idquest) ?>" method="POST">
	<div class="container">
		<!-- Titulo de Datos del Encuestado -->
		<h3>Encuesta <?= $encuesta ?></h3>
		<hr>
		<div class="row">
			<div class="col-8">
				<div data-spy="scroll" data-target="#list-example" data-offset="0" class="scrollspy-example">
					<?php foreach($data as $item): ?>
						<h4><?= $item['reagent'] ?></h4>
						<h4> Respuesta= <?= $item['respuesta'] ?></h4>
						<br>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
		<br>
		<br>
		<!-- Boton para el Agregar Todos los Datos -->
		<div class="form-group">
			<input type="submit" class="btn btn-success" value="Regresar">
		</div>	
	</div>
</form>