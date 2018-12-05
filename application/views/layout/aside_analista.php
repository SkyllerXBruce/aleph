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
			<a href="<?=base_url('analista')?>" class="nav-link <?= $this->uri->segment(2) == '' || $this->uri->segment(2) == 'detalles' || $this->uri->segment(2) == 'encuesta' ? 'active' : ''; ?>"  data-toggle="pill">Encuestas Asignadas</a>
			<a href="<?=base_url('analista/download')?>" class="nav-link <?= $this->uri->segment(2) == 'download' ? 'active' : ''; ?>" data-toggle="pill">Descarga Encuesta</a>
		</div>
	</div>
</nav>