<!-- Titulo de los Usuarios registrados -->
<h3>Lista de Usuarios Registrados</h3>
<!-- Creamos la Tabla -->
<table class="table">
	<!-- Titulo de las Columnas con Estilo para la Tabla -->
  <thead class="thead-dark">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Usuario</th>
      <th scope="col">Correo</th>
			<th scope="col">Rol</th>
			<th scope="col">Acciones</th>
    </tr>
	</thead>
	<!-- Ciclo para Mostrar Cada uno de los Datos -->
  <tbody>
		<?php foreach($data as $item): ?>
    	<tr>
      	<th scope="row"><?= $item->Id ?></th>
      	<td><?= $item->Nombre_Usuario ?></td>
      	<td><?= $item->Correo ?></td>
				<td><?= $item->Rol ?></td>
				<!-- Botones de Editar y Eliminar -->
      	<td><a class="btn btn-warning" href="<?=base_url('users/edit/'.$item->Id)?>" role="button">Editar</a> / <a class="btn btn-danger" href="<?=base_url('users/delete/'.$item->Id)?>" role="button">Eliminar</a></td>
    	</tr>
    <?php endforeach; ?>
  </tbody>
</table>