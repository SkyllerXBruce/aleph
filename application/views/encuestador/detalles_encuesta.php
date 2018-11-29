
<!-- Formulario de Datos del Encuestado -->
<!-- Se agrega el metodo para mandar los datos -->
<form action="<?= base_url('encuestador') ?>" method="POST">
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
	<br>
	<br>
	<!-- Boton para el Agregar Todos los Datos -->
  <div class="form-group">
    <input type="submit" class="btn btn-success" value="Regresar">
  </div>
</form>