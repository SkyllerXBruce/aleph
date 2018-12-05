
<!-- Formulario de Datos del Encuestado -->
<!-- Se agrega el metodo para mandar los datos -->
<form action="<?= base_url('analista') ?>" method="POST">
	<!-- Titulo de Datos del Encuestado -->
	<h3>Detalles de la Encuesta "<?= $data['quest'] ?>"</h3>
	<hr>
	<!-- formamos un grupo de elementos -->
	<div class="form-group">
		<!-- Fila de Datos Basicos -->
    <div class="form-row">
			<!-- Atributos para el Nombre del Encuestado -->
      <div class="col">
        <label>Pertenece al Estudio: <?= $data['study'] ?></label>
			</div>
			<!-- Atributos para el Rango de Edad -->
      <div class="col">
        <label>Usuarios Aplicado la Encuesta: <?= $data['asignadoe'] ?></label>
			</div>
			<!-- Atributos para el Genero -->
			<div class="col">
				<label>Usuarios que Analizarán la Encuesta: <?= $data['asignadoa'] ?></label>
			</div>
		</div>
		<br>
		<!-- Fila de Datos de la Informacion Especializada -->
		<div class="form-row">
			<!-- Atributos para la Localidad -->
      <div class="col-4">
        <label>Tipo de Estudio: <?= $data['typestudy'] ?></label>
  		</div>
			<!-- Atributos para el Genero -->
			<div class="col">
				<label for="">Usuario Actual: <?= $data['user'] ?></label>
			</div>
		</div>
		<br>
		<div class="form-row">
			<!-- Atributos para Información Adicional -->
			<div class="col">
				<label for="">Descripción del Cuestionario: <?= $data['desc'] ?></label>
			</div>
		</div>
	</div>
	<h3>Datos de los Encuestados del Cuestionario "<?= $data['quest'] ?>"</h3>
	<hr>
	<!-- formamos un grupo de elementos -->
	<div class="form-group">
		<table class="table">
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
					<th scope="col">Analizar Encuesta</th>
				</tr>
			</thead>
			<!-- Ciclo para Mostrar Cada uno de los Datos -->
			<tbody>
				<?php foreach($questdone as $item): ?>
					<tr>
						<th><?= $item->Nombre_Encuestado ?></th>
						<td><?= $item->Genero ?></td>
						<td><?= $item->Rango_Edad ?></td>
						<td><?= $item->Localidad ?></td>
						<td><?= $item->Escolaridad ?></td>
						<td><?= $item->Rango_Ingresos ?></td>
						<td><?= $item->Fecha_Relizado ?></td>
						<td><?= $item->Info_Adicional ?></td>
						<td><a class="btn btn-secondary" href="<?=base_url('analista/encuesta/'.$item->IdCuestionarioContestado.'/'.$data['quest'].'/'.$data['idquest'])?>" role="button">Analizar</a></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	<br>
	<!-- Boton para el Agregar Todos los Datos -->
  <div class="form-group">
    <input type="submit" class="btn btn-success" value="Regresar">
  </div>
</form>