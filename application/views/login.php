<!-- Cuerpo  -->
<body>
	<div class="container">
		<div class="row justify-content-lg-center d-flex align-items-center" style="height: 90vh">
			<div class="col-lg-6">
				<form id="frm-login">
                    <div class="form-group text-center">
                        <h1>Login</h1>
                    </div>
                    <div class="card">
                    	<!-- Seccion de Registros y limpieza  -->
						<div class="card-header bg-success mb-3">
							<ul class="nav nav-pills card-header-pills">
								<li class="nav-item">
									<a class="nav-link text-white" href="login">Limpiar</a>
								</li>
							</ul>
						</div>
						<!-- Seccion de Etiquetas y Cuadros Input -->
						<div class="card-body">
							<div class="form-group" id="alert"></div>
							<div class="form-group" id="email">
								<label for="exampleInputEmail1">Correo</label>
								<input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Escriba su email">
								<div class="invalid-feedback"></div>
							</div>
							<div class="form-group" id="password">
								<label for="exampleInputPassword1">Contraseña</label>
								<input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Ingrese su contraseña">  
								<div class="invalid-feedback"></div>
							</div>
							<div class="form-group text-center">
								<button type="submit" class="btn btn-secondary">Ingresar</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Jquery de la Biblitecas de Google -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="<?=base_url('assets/js/auth/login.js')?>"></script>
</body>
</html>