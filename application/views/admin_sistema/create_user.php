<!-- Formulario Alta de Usuarios -->
<!-- Se agrega el metodo para mandar los datos -->
<form action="<?= base_url('users/registrarUsuario') ?>" method="POST">
	<!-- Titulo de Datos del Usuario -->
	<h3>Datos de la Cuenta</h3>
	<hr>
	<!-- formamos un grupo de elementos -->
	<div class="form-group">
		<!-- Fila de Datos de Usuario -->
        <div class="form-row">
			<!-- Atributos para el Nombre de Usuarios -->
        	<div class="col-5">
        		<label for="">Nombre Usuario</label>
        		<input type="text" name="user" class="form-control" placeholder="Inserte nombre de usuario" value="<?= set_value('user') ?>">
				<div class="text-danger"><?= form_error('user') ?></div>
			</div>
			<!-- Atributos para el Correo -->
        	<div class="col">
        		<label for="">Correo</label>
        		<input type="text" name="correo" class="form-control" placeholder="correo@mail.com" value="<?= set_value('correo') ?>">
				<div class="text-danger"><?= form_error('correo') ?></div>
			</div>
			<!-- Atributos para el Rol de Usuario -->
        	<div class="col">
				<label for="">Rol de Usuario</label>
				<!-- Custom Select con las opciones -->
        		<select name="rol" class="custom-select">
        			<option selected value="">Seleccione el Rol</option>
        			<option <?= set_value('rol') == 'Administrador de Sistema' ? 'selected' : ''; ?> value="Administrador de Sistema">Administrador de Sistema</option>
        			<option <?= set_value('rol') == 'Administrador de Estudio' ? 'selected' : ''; ?> value="Administrador de Estudio">Administrador de Estudio</option>
                    <option <?= set_value('rol') == 'Encuestador' ? 'selected' : ''; ?> value="Encuestador">Encuestador</option>
                    <option <?= set_value('rol') == 'Analista' ? 'selected' : ''; ?> value="Analista">Analista</option>
        		</select>
			<div class="text-danger"><?= form_error('rol') ?></div>
        </div>
    </div>
	<br>
	<!-- Titulo de Datos de la Informacion del Usuario -->
    <h3>Información del usuario</h3>
	<hr>
	<!-- formamos un grupo de elementos -->
    <div class="form-group">
		<!-- Fila de Datos de la Informacion Basica del Usuario -->
		<div class="form-row">
			<!-- Atributos para el Nombre o Nombres del Usuario -->
			<div class="col-5">
				<label for="">Nombre(s)</label>
				<input name="name" class="form-control" type="text" placeholder="Inserte su nombre" value="<?= set_value('name') ?>">
				<div class="text-danger"><?= form_error('name') ?></div>
			</div>
			<!-- Atributos para los Apellidos del Usuario -->
			<div class="col-5">
				<label for="">Apellidos</label>
				<input name="lastname" class="form-control" type="text" placeholder="Inserten sus apellidos" value="<?= set_value('lastname') ?>">
				<div class="text-danger"><?= form_error('lastname') ?></div>
			</div>
			<!-- Atributos para la Edad del Usuario -->
			<div class="col">
				<label for="">Edad</label>
				<input name="edad" type="text" class="form-control" placeholder="Ingrese su Edad" value="<?= set_value('edad') ?>">
				<div class="text-danger"><?= form_error('edad') ?></div>
			</div>
		</div>
		<!-- Fila de Datos de la Informacion Especializada del Usuario -->
    	<div class="form-row">
			<!-- Atributos para la Especialidad del Usuario -->
            <div class="col-4">
                <label for="">Especialidad</label>
                <select name="esp" class="custom-select">
                    <option selected value="">Seleccione el Especialidad</option>
                    <option <?= set_value('esp') == 'Administrador de Sistema' ? 'selected' : ''; ?> value="Administrador de Sistema">Administrador de Sistemas</option>
                    <option <?= set_value('esp') == 'Administrador de Estudio' ? 'selected' : ''; ?> value="Administrador de Estudio">Administrador de Estudios</option>
                    <option <?= set_value('esp') == 'Encuestador' ? 'selected' : ''; ?> value="Encuestador">Encuestador</option>
                    <option <?= set_value('esp') == 'Analista' ? 'selected' : ''; ?> value="Analista">Analista</option>
                </select>
                <div class="text-danger"><?= form_error('esp') ?></div>
			</div>
			<!-- Atributos para la Matricula del Usuario -->
    		<div class="col">
    			<label for="">Matrícula</label>
				<input name="matricula" type="text" class="form-control" placeholder="Ingrese su Matricula" value="<?= set_value('matricula') ?>">
				<div class="text-danger"><?= form_error('matricula') ?></div>
			</div>
    	</div>
	</div>
	<!-- Boton para el Agregar Todos los Datos -->
    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Dar de Alta Usuario">
    </div>
</form>
