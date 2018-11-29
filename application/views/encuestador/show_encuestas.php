<!-- Lista de Encuestas -->
<h3>Estudios Asignados</h3>
<!-- Creamos la Tabla -->
<table class="table">
	<!-- Titulo de las Columnas con Estilo para la Tabla -->
  <thead class="thead-dark">
    <tr>
      <th scope="col">Estudios</th>
      <th scope="col">Encuestas</th>
      <th scope="col">Encuestadores</th>
      <th scope="col">Analistas</th>
      <th scope="col">Detalles del Estudio</th>
    </tr>
	</thead>
	<!-- Ciclo para Mostrar Cada uno de los Datos -->
  <tbody>
    <?php foreach($data as $item): ?>
    	<tr>
      	<th scope="row"><?= $item['study'] ?></th>
      	<td><?= $item['quest'] ?></td>
      	<td><?= $item['asignadoe'] ?></td>
        <td><?= $item['asignadoa'] ?></td>
        <!-- Botones de Editar y Eliminar -->
      	<td><a class="btn btn-secondary" href="<?=base_url('encuestador/detalles/'.$item['idquest'])?>" role="button">Detalles de Encuesta</a></td>
    	</tr>
    <?php endforeach; ?>
  </tbody>
</table>