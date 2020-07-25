//valida el formulario
function validarformulario() {
  if (!valor)


    //valida el RUN 
    valor = document.getElementByName("txtRun").value;
  if (valor === null || valor.length === 0 || /^\s+$/.test(valor)) {
    alert("Falta Rut");
    valor.focus();
    return false;
  }

  //valida el nombre     
  valor = document.getElementByName("txtNombre").value;
  if (valor === null || valor.length === 0 || /^\s+$/.test(valor)) {
    alert("Falta nombre ");
    valor.focus();
    return false;
  }
  //valida el Apellido    
  valor = document.getElementByName("txtApellidos").value;
  if (valor === null || valor.length === 0 || /^\s+$/.test(valor)) {
    alert("Faltan apellidos ");
    valor.focus();
    return false;
  }
  //valida el numero de telefono    
  valor = document.getElementByName("id_numtel").value;
  if (valor === null || valor.length === 0 || /^\s+$/.test
    (valor)) {
    alert("Falta numero de telefono");
    valor.focus();
    return false;
  }

  //valida la direccion    
  valor = document.getElementByName("txtDireccion").value;
  if (valor === null || valor.length === 0 || /^\s+$/.test
    (valor)) {
    alert("Faltan direccion ");
    valor.focus();
    return false;
  }

  // valida el EMail 
  var expresion = /^[a-z][\w.-]+@\w[\w.-]+\.[\w.-]*[a-z][a-z]$/i;
  valor = document.getElementsByName("txtCorreo").value;
  if (!expresion.test(valor)) {

    alert("Email invalido o no ingresado");
    email.focus();
    return false;
  }


  valor = document.getElementById('archivoInput');
  if (valor.files.length === 0) {
    alert("Attachment Required");
    valor.focus();

    return false;
  }

}



//Valida los campos que sean solo numeros
function solonumeros(e) {
  key = e.keyCode || e.which;
  teclado = String.fromCharCode(key);
  numeros = "0123456789";
  especiales = "8-37-38-46";
  teclado_especial = false;
  for (var i in especiales) {
    if (key === especiales[i]) {
      teclado_especial = true;
    }
  }
  if (numeros.indexOf(teclado) === -1 && !teclado_especial) {
    return false;
  }
}
//Valida los campos que sean solo letras
function sololetras(f) {
  key = f.keyCode || f.which;
  teclado = String.fromCharCode(key).toLowerCase();
  letras = "abcdefghijklmñopqrstuvwxyz";
  especiales = "9-37-38-46-164";
  teclado_especial = false;
  for (var i in especiales) {
    if (key === especiales[i]) {
      teclado_especial = true;
      break;
    }
  }
  if (letras.indexOf(teclado) === -1 && !teclado_especial) {
    return false;
  }
}
//valida el campo Rut
function checkRut(textRun) {
  // Despejar Puntos
  var valor = textRun.value.replace('.', '');
  // Despejar Guión
  valor = valor.replace('-', '');

  // Aislar Cuerpo y Dígito Verificador
  cuerpo = valor.slice(0, -1);
  dv = valor.slice(-1).toUpperCase();

  // Formatear RUN
  textRun.value = cuerpo + '-' + dv

  // Si no cumple con el mínimo ej. (n.nnn.nnn)
  if (cuerpo.length < 7) { textRun.setCustomValidity("RUT Incompleto"); return false; }

  // Calcular Dígito Verificador
  suma = 0;
  multiplo = 2;

  // Para cada dígito del Cuerpo
  for (i = 1; i <= cuerpo.length; i++) {

    // Obtener su Producto con el Múltiplo Correspondiente
    index = multiplo * valor.charAt(cuerpo.length - i);

    // Sumar al Contador General
    suma = suma + index;

    // Consolidar Múltiplo dentro del rango [2,7]
    if (multiplo < 7) { multiplo = multiplo + 1; } else { multiplo = 2; }

  }

  // Calcular Dígito Verificador en base al Módulo 11
  dvEsperado = 11 - (suma % 11);

  // Casos Especiales (0 y K)
  dv = (dv == 'K') ? 10 : dv;
  dv = (dv == 0) ? 11 : dv;

  // Validar que el Cuerpo coincide con su Dígito Verificador
  if (dvEsperado != dv) { textRun.setCustomValidity("RUT Inválido deberia ser 12345678-9 o 1234567-8"); return false; }

  // Si todo sale bien, eliminar errores (decretar que es válido)
  textRun.setCustomValidity('');
}