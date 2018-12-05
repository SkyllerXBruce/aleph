<!-- Aside -->
<nav class="col-md-2 d-none d-md-block bg-light sidebar">
	<!-- Caracteristicas de la Barra -->
	<style>
		.sidebar-sticky{
			position: -webkit-sticky;
			position: sticky;
			top: 78px;
			height: calc(100vh - 78px);
			padding-top: .5rem;
			overflow-x: hidden;
			overflow-y: auto;
		}
	</style>
	<div class="sidebar-sticky" style="margin-top: 1em;">
		<!-- Mensaje Temporal -->
		<?php if($dat = $this->session->flashdata('msg')): ?>
			<div class="alert alert-primary" role="alert">
				<?=$dat?>
			</div>
		<?php endif; ?>
		<!-- Links de la Barra Lateral -->
		<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
			<a href="<?=base_url('encuestador')?>" class="nav-link <?= $this->uri->segment(2) == '' || $this->uri->segment(2) == 'detalles' ? 'active' : ''; ?>"  data-toggle="pill">Estudios Asignados</a>
			<a href="<?=base_url('encuestador/create')?>" class="nav-link <?= $this->uri->segment(2) == 'create' || $this->uri->segment(2) == 'addEncuestado' ? 'active' : ''; ?>" data-toggle="pill">Realizar Encuesta</a>
		</div>
	</div>
</nav>