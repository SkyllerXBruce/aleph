<!-- Lista de Encuestas -->
<h3>Lista de Encuestas</h3>
<!-- Creamos la Tabla -->
<table class="table">
	<!-- Titulo de las Columnas con Estilo para la Tabla -->
  <thead class="thead-dark">
    <tr>
      <th scope="col">Estudios</th>
      <th scope="col">Cuestionario</th>
      <th scope="col">Descripción de Cuestionario</th>
    </tr>
	</thead>
	<!-- Ciclo para Mostrar Cada uno de los Datos -->
  <tbody>
    <?php foreach($data as $item): ?>
    	<tr>
      	<th scope="row"><?= $item['study'] ?></th>
      	<td><?= $item['quest'] ?></td>
      	<td><?= $item['desc'] ?></td>
    	</tr>
    <?php endforeach; ?>
  </tbody>
</table>