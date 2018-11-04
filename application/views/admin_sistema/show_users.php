<h1>Lista de Usuarios Registrados</h1>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Usuario</th>
      <th scope="col">Correo</th>
			<th scope="col">Status</th>
			<th scope="col">Rol</th>
			<th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
		<?php foreach($data as $item): ?>
    	<tr>
      	<th scope="row"><?= $item->Id ?></th>
      	<td><?= $item->Nombre_Usuario ?></td>
      	<td><?= $item->Correo ?></td>
      	<td><?= $item->Status ?></td>
      	<td><?= $item->Rol ?></td>
      	<td><a class="btn btn-warning" href="<?=base_url('users/edit/'.$item->Id)?>" role="button">Editar</a> / <a class="btn btn-danger" href="<?=base_url('users/edit/'.$item->Id)?>" role="button">Eliminar</a></td>
    	</tr>
    <?php endforeach; ?>
  </tbody>
</table>
