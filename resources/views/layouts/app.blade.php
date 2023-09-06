<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link rel="stylesheet" href="./estilos.css">-->
    <title>COORPAPER</title>
</head>
<body>
  <header> <!-- header es una sección para el encabezado de la página-->
    <img src="./Logo - Papelería y más - Azul.png" alt="LogoPapeleríaymás">
    <nav class="right-nav">
      <ul>
        <li><a href="#">Papelería y más</a></li>
        <li><a href="#">Sobre CoorPaper</a></li>
        <li><a href="#">Contacto</a></li>
      </ul>
    </nav>
  </header>

  <main> <!--En main se puede poner el contenido principal de la página-->
    <section>
      <div class="pestañasNav">

        <div class="pestañas">
          <input type="radio" name="pestañas" id="pestañas1" checked>
          <label for="pestañas1">Administrador</label>
            <div class="pestañasconte">
              <ul>
                <li><a href="#">Registro de producto</a></li>
                <li><a href="#">Modificación de producto</a></li>
                <li><a href="#">Inventario</a></li>
                <li><a href="#">Registro de ventas</a></li>
                <li><a href="#">Informe de ventas</a></li>
                <li><a href="#">Registro de usuario</a></li>
                <li><a href="#">Modificación de usuario</a></li>
                <li><a href="#">Información de proveedores</a></li>
                </ul>
            </div>
        </div>

        <div class="pestañas">
          <input type="radio" name="pestañas" id="pestañas2">
          <label for="pestañas2">Ventas</label>
            <div class="pestañasconte">
              <ul>
                <li><a href="#">Registro de ventas</a></li>
                <li><a href="#">Inventario</a></li>
                <li><a href="#">Informe de ventas</a></li>
              </ul>                   
            </div>
        </div>

      </div>
    </section>
  </main>

    <footer>
      <p>COORPAPER, 2023</p>
    </footer>

</body>
</html>