<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Editar Producto</title>
  <style>
    .error { color: red; font-size: 0.9em; margin-left: 5px; }
  </style>
</head>
<body>
  <h1>Editar Artículo Deportivo</h1>

  <form id="formulario" action="http://localhost/tecweb/practicas/p10/update_producto.php" method="post">
    <fieldset>
      <legend>Información del Producto</legend>
      <input type="hidden" name="id" value="<?= $_GET['id'] ?? '' ?>">

      <ul id="entradas">
        <li>
          <label>Nombre:</label>
          <input type="text" name="nombre" value="<?= $_GET['nombre'] ?? '' ?>">
          <span class="error"></span>
        </li>

        <li>
          <label>Marca:</label>
          <div class="marca-options">
            <?php
            $marcas = ["Nike","Adidas","Puma","Reebok","New Balance","Asics"];
            $marca_actual = $_GET['marca'] ?? '';
            foreach($marcas as $marca):
            ?>
              <label>
                <input type="radio" name="marca" value="<?= $marca ?>" <?= ($marca == $marca_actual) ? 'checked' : '' ?>>
                <?= $marca ?>
              </label><br>
            <?php endforeach; ?>
          </div>
          <span class="error"></span>
        </li>

        <li>
          <label>Modelo:</label>
          <input type="text" name="modelo" value="<?= $_GET['modelo'] ?? '' ?>">
          <span class="error"></span>
        </li>

        <li>
          <label>Precio:</label>
          <input type="number" step="0.01" name="precio" value="<?= $_GET['precio'] ?? '' ?>">
          <span class="error"></span>
        </li>

        <li>
          <label>Detalles:</label><br>
          <textarea name="detalles" rows="3" cols="100"><?= $_GET['detalles'] ?? '' ?></textarea>
          <span class="error"></span>
        </li>

        <li>
          <label>Unidades:</label>
          <input type="number" name="unidades" value="<?= $_GET['unidades'] ?? '' ?>">
          <span class="error"></span>
        </li>

        <li>
          <label>Imagen:</label>
          <input type="text" name="imagen" value="<?= $_GET['imagen'] ?? '' ?>">
          <span class="error"></span>
        </li>
      </ul>
    </fieldset>
      <input type="submit" value="Actualizar Producto">
      <input type="reset" value="Limpiar">
  </form>

  <script>
    const formulario = document.getElementById('formulario');
    const entradas = formulario.querySelectorAll('input, textarea');

    formulario.addEventListener('submit', function(e) {
      let valido = true;

      // Limpiar errores
      formulario.querySelectorAll('.error').forEach(span => span.textContent = '');

      entradas.forEach(input => {
        if(input.name !== 'imagen' && input.value.trim() === '') {
          input.nextElementSibling.textContent = 'Este campo es obligatorio';
          valido = false;
        }

        if(input.name === 'precio' && input.value < 0) {
          input.nextElementSibling.textContent = 'El precio debe ser mayor o igual a 0';
          valido = false;
        }

        if(input.name === 'unidades' && input.value < 0) {
          input.nextElementSibling.textContent = 'Las unidades deben ser mayores o iguales a 0';
          valido = false;
        }
      });

      // Validar que se haya seleccionado una marca
      const marcaSeleccionada = formulario.querySelector('input[name="marca"]:checked');
      if(!marcaSeleccionada) {
        formulario.querySelector('.marca-options + .error').textContent = 'Debe seleccionar una marca';
        valido = false;
      }

      if(!valido) e.preventDefault(); // Detener envío si hay errores
    });
  </script>
</body>
</html>
