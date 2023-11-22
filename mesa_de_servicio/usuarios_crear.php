<!DOCTYPE html>
<html>
<body>

<h2>Formulario de Cliente</h2>

<form id="clienteForm" method="POST">
  <label for="ced">Cédula:</label><br>
  <input type="text" id="ced" name="ced"><br>
  <label for="nom">Nombre:</label><br>
  <input type="text" id="nom" name="nom"><br>
  <label for="dir">Dirección:</label><br>
  <input type="text" id="dir" name="dir"><br>
  <label for="tel">Teléfono:</label><br>
  <input type="text" id="tel" name="tel"><br>
  <input type="submit" value="Enviar">
</form>

  <script>
      document.querySelector('#clienteForm').addEventListener('submit', function(evento) {

      evento.preventDefault();

      var ced = document.getElementById('ced').value;
      var nom = document.getElementById('nom').value;
      var dir = document.getElementById('dir').value;
      var tel = document.getElementById('tel').value;

      var data = {
        ced: ced,
        nom: nom,
        dir: dir,
        tel: tel
      };

      fetch('http://localhost/web_electiva_II_BASE/api/clientesCrear.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(data),
      })
      .then(response => response.json())
      .then(data => {
        console.log('Success:', data);
      })
      .catch((error) => {
        console.error('Error:', error);
      });
      });


  </script>
</body>
</html>
