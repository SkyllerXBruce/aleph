<!-- falta crear vista -->
<h3>Lista de Estudios</h3>
<!-- Creamos la Tabla -->
<table class="table">
	<!-- Titulo de las Columnas con Estilo para la Tabla -->
  <thead class="thead-dark">
    <tr>
      <th scope="col">Estudios</th>
      <th scope="col">Tipo de Estudio</th>
      <th scope="col">Encuestador Asignado</th>
      <th scope="col">Analista Asignado</th>
    </tr>
	</thead>
	<!-- Ciclo para Mostrar Cada uno de los Datos -->
  <tbody>
    <?php foreach($data as $item): ?>
    	<tr>
      	<th scope="row"><?= $item->Estudio ?></th>
      	<td><?= $item->Tipo ?></td>
      	<td><?= $item->Encuestador ?></td>
				<td><?= $item->Analista ?></td>
    	</tr>
    <?php endforeach; ?>
  </tbody>
</table>