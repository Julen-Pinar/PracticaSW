var verValores = function() {
  var sAux = "";
  var frm = document.getElementById("registro");
  for(var i=0;i<frm.elements.length;i++) {
    sAux += "Nombre: " + frm.elements[i].name + " ";
    sAux += "Valor: " + frm.elements[i].value + "\n";
  }
  alert(sAux);
}
var validar = function () {
  // Pongo en lineas separadas para que compruebe todas y siga aunque la primera sea falsa(evaluacion en cortocircuito)
  var correoOK = validarCorreo();
  var NombreOK = validarNombre();
  var Apellido1OK = validarApellido1();
  var Apellido2OK = validarApellido2();
  var passwordOK = validarPassword();
  var repeatPasswordOK = validarRepeatPassword();
  var telefonoOK = validarTelefono();
  var especialidadOk = validarEspecialidad();
  return correoOK && NombreOK && Apellido1OK && Apellido2OK && passwordOK && repeatPasswordOK && telefonoOK && especialidadOk;
}
var validarCorreo = function() {
  var dom_pointer = document.getElementById("Email");
  var reg = dom_pointer.value.match(/^[A-Za-z]*\d{3}@ikasle.ehu.(es|eus)$/i);
  if(reg === null) {
    dom_pointer.style.borderColor = "#FE2E2E";
    return false;

  } else {
    dom_pointer.style.borderColor ="#8AFC94";
    return true;
  }
}
var validarNombre = function() {
  var dom_pointer = document.getElementById("Nombre");
  var reg = dom_pointer.value.match(/[A-Za-z]+/i);
  if(reg === null) {
    dom_pointer.style.borderColor = "#FE2E2E";
    return false;

  } else {
    dom_pointer.style.borderColor ="#8AFC94";
    return true;
  }
}

var validarApellido1 = function() {
  var dom_pointer = document.getElementById("Apellido1");
  var reg = dom_pointer.value.match(/[A-Za-z]+/i);
  if(reg === null) {
    dom_pointer.style.borderColor = "#FE2E2E";
    return false;

  } else {
    dom_pointer.style.borderColor ="#8AFC94";
    return true;
  }
}

var validarApellido2 = function() {
  var dom_pointer = document.getElementById("Apellido2");
  var reg = dom_pointer.value.match(/[A-Za-z]+/i);
  if(reg === null) {
    dom_pointer.style.borderColor = "#FE2E2E";
    return false;

  } else {
    dom_pointer.style.borderColor ="#8AFC94";
    return true;
  }
}
var validarPassword = function() {
  var dom_pointer = document.getElementById("Password");
  if(dom_pointer.value.length < 6) {
    //addErrorPassword("Password mayor de 6 caracteres");
    addError("Password mayor de 6 caracteres", "errorPassword");
    dom_pointer.style.borderColor = "#FE2E2E";
    return false;

  } else {
    removeError("errorPassword");
    dom_pointer.style.borderColor ="#8AFC94";
    return true;
  }
}
var validarRepeatPassword = function() {
  var dom_pointer = document.getElementById("RepeatPassword");
  var dom_pointer2 = document.getElementById("Password");
  if((dom_pointer.value !== dom_pointer2.value) || (dom_pointer.value.length < 6) ) {
    //addErrorRepeatPassword("Password no son iguales");
    addError("Password no son iguales", "errorRepeatPassword");
    dom_pointer.style.borderColor = "#FE2E2E";
    return false;

  } else {
    removeError("errorRepeatPassword");
    dom_pointer.style.borderColor ="#8AFC94";
    return true;
  }
}
var validarTelefono = function() {
  var dom_pointer = document.getElementById("Telefono");
  var reg = dom_pointer.value.match(/^\d{9}$/i);
  if(reg === null) {
    //addErrorTelefono("El telefono tiene que tener 9 digitos");
    addError("El telefono tiene que tener 9 digitos", "errorTelefono");
    dom_pointer.style.borderColor = "#FE2E2E";
    return false;

  } else {
    removeError("errorTelefono");
    dom_pointer.style.borderColor ="#8AFC94";
    return true;
  }
}
var validarEspecialidad = function() {
  var dom_pointer = document.getElementById("Especialidad");
  var dom_pointer2 = document.getElementById("especialidad");
  if(dom_pointer.options.selectedIndex === 0 ) {
    //addErrorEspecialidad("Seleccione una especialidad");
    addError("Seleccione una especialidad", "errorEspecialidad");
    dom_pointer.style.borderColor = "#FE2E2E";
    document.getElementById("especialidadotra").style.display = "none";
    return false;

  } else if (dom_pointer.options.selectedIndex === 4){
    dom_pointer.style.borderColor ="#8AFC94";
    document.getElementById("especialidadotra").style.display = "block";

    if(dom_pointer2.value.length === 0) {
      dom_pointer2.style.borderColor = "#FE2E2E";
      return false;
    } else {
      dom_pointer2.style.borderColor = "#8AFC94";
      return true;
    }
  } else {
    removeError("errorEspecialidad");
    document.getElementById("especialidadotra").style.display = "none";
    dom_pointer.style.borderColor ="#8AFC94";
    dom_pointer2.value= "";
    return true;
  }
}
var showImage = function(input) {

  var dom_pointer = document.getElementById("imageShow");
  var dom_pointer2 = document.getElementById("file");
  var tmp = URL.createObjectURL(dom_pointer2.files[0]);
  if(dom_pointer2.value === "") {
      dom_pointer.innerHTML = "";
  } else {
      dom_pointer.innerHTML = "<img src='" + tmp + "'  width=100px>";
  }

}
var addError = function(text,element) {
  var dom_pointer = document.getElementById(element);
  dom_pointer.innerHTML = "<p class='error'>"+text+"</p>";
}
var removeError = function(element) {
  var dom_pointer = document.getElementById(element);
  dom_pointer.innerHTML = "";
}
//main
var XMLHttpRequestObject = new XMLHttpRequest();
var XMLConexionUsuario = new XMLHttpRequest();
var XMLConexionTotal = new XMLHttpRequest();
var estado;

XMLHttpRequestObject.onreadystatechange = function() {
	if(XMLHttpRequestObject.readyState == 1)  
	{
		var pointer = document.getElementById("page");
		pointer.innerHTML = "<center><img src='img/loading.gif' width=150></center>";
	}
  if(XMLHttpRequestObject.readyState == 4)
  {
    var pointer = document.getElementById("page");
    pointer.innerHTML = XMLHttpRequestObject.responseText;
  }
};
XMLConexionUsuario.onreadystatechange = function() {
	 if(XMLConexionUsuario.readyState == 4)
  {
	var preguntasUsuario = document.getElementById("preguntasUsuario");
	  preguntasUsuario.innerHTML = XMLConexionUsuario.responseText;
  }
};
XMLConexionTotal.onreadystatechange = function() {
	 if(XMLConexionTotal.readyState == 4)
  {
	var preguntasTotal = document.getElementById("preguntasTotales");
	  preguntasTotal.innerHTML = XMLConexionTotal.responseText;
  }
};
$(document).ready (function() {
	$("Form").hide();
});


function showModificar() {
  if(estado!=="modificando") {
    XMLHttpRequestObject.open("GET", "showModificar.php");
    XMLHttpRequestObject.send(null);
    estado = "modificando";
  }
}
function showVer() {
  if(estado !== "viendo") {
    XMLHttpRequestObject.open("GET", "showVer.php");
    XMLHttpRequestObject.send(null);
    estado = "viendo";
  }
}
function showPreguntas() {
	XMLConexionUsuario.open("GET","funciones.php?op=preguntasUsuario",true);
	XMLConexionUsuario.send(null);
	XMLConexionTotal.open("GET","funciones.php?op=preguntasTotales",true);
	XMLConexionTotal.send(null);
	setTimeout(showPreguntas, 5000);
}

function addPregunta() {
  var Pregunta = document.getElementById("Pregunta").value;
  var Respuesta = document.getElementById("Respuesta").value;
  var Tema = document.getElementById("Tema").value;
  var Complejidad = document.getElementById("Complejidad").value;
  XMLHttpRequestObject.open("POST", "add_insertarPregunta.php", true);
  XMLHttpRequestObject.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  XMLHttpRequestObject.send("Pregunta="+Pregunta+"&Respuesta="+Respuesta+"&Tema="+Tema+"&Complejidad="+Complejidad);
  estado="desconocido";
}
