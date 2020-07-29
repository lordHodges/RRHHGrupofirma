var base_url = "http://www.imlchilel.cl/grupofirma/index.php/";

function editarPerfil() {
	var nombre = $("#name").val();
	var correo = $("#email").val();
	var clave = $("#pass1").val();
	var clave2 = $("#pass2").val();
	var idUser = $("#labelUsuario").text();
	var error = 0;

	if (nombre == "" || correo == "") {
		toastr.error("Nombre de usuario y correo son campos obligatorios");
	} else {
		// si las claves no coinciden
		if (clave != clave2 && clave != "") {
			toastr.error("Las contraseñas no coinciden");
			error = 1;
			// si no intentaron modificar las contraseñas
		} else if (clave == "") {
			clave = "vacio";
		}

		if (error == 0) {
			$.ajax({
				url: "editarMiPerfil",
				type: "POST",
				dataType: "json",
				data: { nombre: nombre, correo: correo, clave: clave, idUser: idUser },
			}).then(function (msg) {
				if (msg == "ok") {
					toastr.success("Debe iniciar sesión nuevamente para ver los cambios");
					$("#pass1").val("");
					$("#pass2").val("");
				} else {
					toastr.error("Error al intentar modificar.");
				}
			});
		}
	}
}
