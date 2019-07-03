<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrate</title>
    <link href="https://fonts.googleapis.com/css?family=Oswald|Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Css/Normalize.css">
    <link rel="stylesheet" href="Css/Main.css">
</head>
<body>
   
<header class="site-header">
    <div class="contenedor contenido-header">
        <div class="barra">
            <a href="Index.php">
                <img src="" alt="Logotipo">
            </a>
            
            <nav class="navegacion">
                <a href="Conocenos.php">Conocenos</a>
                <a href="Paquetes.php">Paquetes</a>
                <a href="Contacto.php">Contacto</a>
                <a href="Videos.php">Videos</a>
                <a href="Registro.php">Registro</a>
            </nav>
        </div> <!-- .barra -->
    </div> <!-- .contenedor .contenido-header -->
</header> <!-- .site-header -->

<main class="contenido-centrado seccion contenedor">
    <h2 class="centrar-texto">Llena el formulario de registro</h2>
    
    <form action="" class="registro">
        <fieldset>
            <legend>Información Personal</legend>
            <label for="nombre">Nombre: </label>
            <input type="text" id="nombre" placeholder="Ingresa tu nombre" required>
            <label for="ap_pat">Apellido Paterno: </label>
            <input type="text" id="ap_pat" placeholder="Ingresa tu apellido paterno" required>
            <label for="ap_mat">Apellido Materno: </label>
            <input type="text" id="ap_mat" placeholder="Ingresa tu apellido materno" required>
            <label for="telefono">Teléfono: </label>
            <input type="tel" id="telefono" placeholder="Ingresa tu número telefónico" required>
            <label for="email">Correo electronico: </label>
            <input type="email" id="email" placeholder="Ingresa tu correo electronico" required>
            <label for="contraseña">Contraseña: </label>
            <input type="password" id="contraseña" placeholder="Ingresa tu contraseña" required>
        </fieldset>
        
        <fieldset>
            <legend>Tipo de usuario</legend>
            <p>¿Qué tipo de usuario es usted?</p>
            <div class="forma-usuario">
                <label for="cliente">Cliente</label>
                <input type="radio" id="cliente" name="usuario">
                <label for="proveedor">Proveedor</label>
                <input type="radio" id="proveedor" name="usuario">
            </div>
        </fieldset>
        
        <input type="submit" value="Enviar" class="boton boton-verde submit">
    </form>
</main>
    
    
<footer class="site-footer seccion">
    <div class="contenedor contenedor-footer">
        <nav class="navegacion">
            <a href="Conocenos.php">Conocenos</a>
            <a href="Paquetes.php">Paquetes</a>
            <a href="Contacto.php">Contacto</a>
            <a href="Videos.php">Videos</a>
            <a href="Registro.php">Registro</a>
        </nav>
        
        <p class="copyright">Todos los derechos reservados por Jizatec Studio 2019 &copy;</p>
    </div> <!-- .contenedor .contenedor-footer -->
</footer> <!-- .site-footer .seccion -->    
</body>
</html>