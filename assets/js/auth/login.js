// creacion de reglas con ajax para login
(function($){
	// ponemos con #el nombre de login
	$("#frm-login").submit(function(ev){
			// Estos 3 partes remueven los mensajes de error si el usuario ya ingreso los datos correctamente
			$("#alert").html('');
			$("#email > input").removeClass("is-invalid");
			$("#password > input").removeClass("is-invalid");
			// iniciamos ajax
			$.ajax({
					// Ponemos la caracteristicas que va a leer ajax
					url: 'login/validate',
					type: 'POST',
					data: $(this).serialize(),
					// Método de acceso si todo esta correcto redirecciona a la url designada
					success: function(err){
							var json = JSON.parse(err);
							window.location.replace(json.url)
					},
					// Método de errores
					statusCode: {
							// Error 400 que detecta si las entradas están vacias
							400: function(xhr){
									var json = JSON.parse(xhr.responseText);
									// Comprueba si el Correo Contiene Algo 
									if(json.email.length != 0){
											$("#email > div").html(json.email);
											$("#email > input").addClass('is-invalid');
									}
									// Comprueba si la Contraseña Contiene Algo
									if(json.password.length != 0){
											$("#password > div").html(json.password);
											$("#password > input").addClass('is-invalid');
									}   
							},
							// Error 401 que detecta si los datos son correctos o no
							401: function(xhr){
									var json = JSON.parse(xhr.responseText);
									// Mensaje de Alerta para verificacion de Mensaje
									$("#alert").html('<div class="alert alert-danger" role="alert">'+ json.msg +'</div>');
							}  
					}
			});
			ev.preventDefault(); // Desactiva la Accion del Formulario para Usar estas Reglas
	});
})(jQuery);