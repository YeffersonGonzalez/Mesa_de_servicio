function guardarDatos() {


  // Obtener el formulario
  var formulario = document.getElementById('miFormulario');

  // Verificar si el formulario es válido
  if (!formulario.checkValidity()) {
    // Si el formulario no es válido, mostrar un mensaje de error y salir de la función
    alert('Por favor, llena todos los campos requeridos.');
    return;
  }





  // Obtener los valores del formulario
  var nombre = document.getElementById('nombre').value;
  var apellido = document.getElementById('apellido').value;
  var tipoid = document.getElementById('tipoid').value;
  var numero = document.getElementById('numero').value;
  var edad = document.getElementById('edad').value;
  var describ = document.getElementById('describ').value;
  

  // Crear una nueva fila
  var fila = document.createElement('tr');

  // Crear las celdas de la fila y agregar los datos
  var celdaNombre = document.createElement('td');
  celdaNombre.textContent = nombre;
  fila.appendChild(celdaNombre);

  var celdaApellido = document.createElement('td');
  celdaApellido.textContent = apellido;
  fila.appendChild(celdaApellido);

  var celdaTipoid = document.createElement('td');
  celdaTipoid.textContent = tipoid;
  fila.appendChild(celdaTipoid);

  var celdaID = document.createElement('td');
  celdaID.textContent = numero;
  fila.appendChild(celdaID);

  var celdaEdad = document.createElement('td');
  celdaEdad.textContent = edad;
  fila.appendChild(celdaEdad);
  
  var celdaDescrib = document.createElement('td');
  celdaDescrib.textContent = describ;
  fila.appendChild(celdaDescrib);

  // Agregar la fila a la tabla
  var tabla = document.getElementById('tablaDatos');
  tabla.appendChild(fila);
}
