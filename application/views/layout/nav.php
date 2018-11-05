<!-- Barra Superior del Dashboard -->
<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top" style="background-color: #e3f2fd;">
	<!-- Titulo -->
	<span class="navbar-text navbar-brand">Sistema de Encuestas</span>
	<!-- Agrupamos en el Nav los Elementos y sus Caracteristicas -->
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto"></ul>
		<ul class="navbar-nav">
			<!-- Mostramos el Rol del Usuario -->
			<li class="nav-item">
				<a class="nav-link disabled" href=""><strong>Rol de Usuario:</strong> <?= $this->session->rol ?></a>
			</li>
			<!-- Mostramos el Nombre del Usuario -->
			<li class="nav-item divider">
				<a class="nav-link disabled" href=""><strong>Nombre de Usuario:</strong> <?= $this->session->nombre_usuario ?></a>
			</li>
			<!-- Boton Cerrar Sesión -->
			<li class="nav-item" style="margin-left: 2em;">
				<a href="<?=base_url('login/logout')?>" class="btn btn-warning">Cerrar Sesión</a>
			</li>
		</ul>
	</div>
</nav>