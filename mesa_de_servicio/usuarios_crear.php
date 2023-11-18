<!DOCTYPE html>
<html>
<body>

<h2>Formulario de creación de usuario</h2>

<form id="myForm">
  <label for="user">Usuario:</label><br>
  <input type="text" id="user" name="user"><br>
  <label for="pass">Contraseña:</label><br>
  <input type="password" id="pass" name="pass"><br>
  <label for="correo">Correo:</label><br>
  <input type="email" id="correo" name="correo"><br>
  <label for="rol">Rol:</label><br>
  <input type="text" id="rol" name="rol"><br>
  <input type="button" value="Enviar" onclick="crearUsuario()">
</form> 

<script>
function crearUsuario() {
    let datos = {
        user: document.getElementById('user').value,
        pass: document.getElementById('pass').value,
        correo: document.getElementById('correo').value,
        rol: document.getElementById('rol').value
    };

    fetch('http://localhost/web_electiva_II_BASE/api/usuario_api.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(datos),
    })
    .then(response => response.json())
    .then(data => {
        console.log('Éxito:', data);
    })
    .catch((error) => {
        console.error('Error:', error);
    });
}

</script>

</body>
</html>
