<?php include_once 'includes/templates/header.php'; ?>

<section class="seccion contenedor">
  <h2>Registro de usuarios</h2>
  <form action="pagar.php" id="registro" class="registro" method="post">
    <div id="datos_usuario" class="registro caja clearfix">
      <div class="campo">
        <label for="nombre">Nombre: </label>
        <input type="text" id="nombre" name="nombre" placeholder="Ingresa tu nombre" required>
      </div> <!-- campo -->
      <div class="campo">
        <label for="apellido">Apellido: </label>
        <input type="text" id="apellido" name="apellido" placeholder="Ingresa tu apellido" required>
      </div> <!-- campo -->
      <div class="campo">
        <label for="email">Correo: </label>
        <input type="email" id="email" name="email" placeholder="Ingresa tu correo" required>
      </div> <!-- campo -->
      <div id="error"></div> <!-- #error -->
    </div> <!-- #datos_usuario registro caja clearfix -->

    <div id="paquetes" class="paquetes">
      <h3>Elige el numero de boletos</h3>
      <ul class="lista-precios clearfix">
        <li>
          <div class="tabla-precio">
            <h3>Pase por dia (lunes)</h3>
            <p class="numero">$30</p>
            <ul>
              <li>Bocadillos Gratis</li>
              <li>3 conferencias</li>
              <li>5 talleres</li>
            </ul>
            <div class="orden">
              <label for="pase_dia">Boletos deseados: </label>
              <input type="number" min="0" id="pase_dia" size="3" name="boletos[un_dia][cantidad]" placeholder="0">
              <input type="hidden" value="30" name="boletos[un_dia][precio]">
            </div> <!-- orden -->
          </div> <!-- tabla-precio -->
        </li>
        <li>
          <div class="tabla-precio">
            <h3>Todos los dias</h3>
            <p class="numero">$50</p>
            <ul>
              <li>Bocadillos Gratis</li>
              <li>Todas las conferencias</li>
              <li>Todos los talleres</li>
            </ul>
            <div class="orden">
              <label for="pase_completo">Boletos deseados: </label>
              <input type="number" min="0" id="pase_completo" size="3" name="boletos[completo][cantidad]" placeholder="0">
              <input type="hidden" value="50" name="boletos[completo][precio]">
            </div> <!-- orden -->
          </div> <!-- tabla-precio -->
        </li>
        <li>
          <div class="tabla-precio">
            <h3>Pase por 2 dias (lunes y martes)</h3>
            <p class="numero">$45</p>
            <ul>
              <li>Bocadillos Gratis</li>
              <li>6 conferencias</li>
              <li>10 talleres</li>
            </ul>
            <div class="orden">
              <label for="pase_dosdias">Boletos deseados: </label>
              <input type="number" min="0" id="pase_dosdias" size="3" name="boletos[2dias][cantidad]" placeholder="0">
              <input type="hidden" value="45" name="boletos[2dias][precio]">
            </div> <!-- orden -->
          </div> <!-- tabla-precio -->
        </li>
      </ul> <!-- lista-precios clearfix -->
    </div> <!-- #paquetes paquetes -->

    <div id="eventos" class="eventos clearfix">
      <h3>Elige tus talleres</h3>
      <div class="caja">
        <div id="lunes" class="contenido-dia clearfix">
          <h4>Lunes</h4>
          <div>
            <p>Talleres: </p>
            <label><input type="checkbox" name="registro[]" id="taller_01" value="taller_01"><time>10:00</time> Responsive Web Design </label>
            <label><input type="checkbox" name="registro[]" id="taller_02" value="taller_02"><time>12:00</time> Flexbox </label>
            <label><input type="checkbox" name="registro[]" id="taller_03" value="taller_03"><time>14:00</time> HTML5 y CSS3 </label>
            <label><input type="checkbox" name="registro[]" id="taller_04" value="taller_04"><time>17:00</time> Drupal </label>
            <label><input type="checkbox" name="registro[]" id="taller_05" value="taller_05"><time>19:00</time> Wordpress </label>
          </div>
          <div>
            <p>Conferencias: </p>
            <label><input type="checkbox" name="registro[]" id="conf_01" value="conf_01"><time>10:00</time> Como ser un Freelancer </label>
            <label><input type="checkbox" name="registro[]" id="conf_02" value="conf_02"><time>17:00</time> Tecnologías del futuro </label>
            <label><input type="checkbox" name="registro[]" id="conf_03" value="conf_03"><time>19:00</time> Seguridad en la web </label>
          </div>
          <div>
            <p>Seminarios: </p>
            <label><input type="checkbox" name="registro[]" id="sem_01" value="sem_01"><time>10:00</time> Diseño UI y UX para móviles </label>
          </div>
        </div> <!-- #viernes contenido-dia clearfix -->

        <div id="martes" class="contenido-dia clearfix">
          <h4>Martes</h4>
          <div>
            <p>Talleres: </p>
            <label><input type="checkbox" name="registro[]" id="taller_06" value="taller_06"><time>10:00</time> AngularJS </label>
            <label><input type="checkbox" name="registro[]" id="taller_07" value="taller_07"><time>12:00</time> PHP & Mysql </label>
            <label><input type="checkbox" name="registro[]" id="taller_08" value="taller_08"><time>14:00</time> JavaScript avanzado </label>
            <label><input type="checkbox" name="registro[]" id="taller_09" value="taller_09"><time>17:00</time> SEO en google </label>
            <label><input type="checkbox" name="registro[]" id="taller_10" value="taller_10"><time>19:00</time> De Photoshop a HTML5 & CSS3 </label>
            <label><input type="checkbox" name="registro[]" id="taller_11" value="taller_11"><time>21:00</time> PHP medio y avanzado </label>
          </div>
          <div>
            <p>Conferencias: </p>
            <label><input type="checkbox" name="registro[]" id="conf_04" value="conf_04"><time>10:00</time> Como crear una tienda online que venda millones en pocos dias </label>
            <label><input type="checkbox" name="registro[]" id="conf_05" value="conf_05"><time>17:00</time> Los mejores lugares para encontrar trabajo </label>
            <label><input type="checkbox" name="registro[]" id="conf_06" value="conf_06"><time>19:00</time> Pasos para crear un negocio rentable </label>
          </div>
          <div>
            <p>Seminarios: </p>
            <label><input type="checkbox" name="registro[]" id="sem_02" value="sem_02"><time>10:00</time> Aprende a programar en una mañana </label>
            <label><input type="checkbox" name="registro[]" id="sem_03" value="sem_03"><time>17:00</time> Tecnológias Mean Stack </label>
          </div>
        </div> <!-- #sabado contenido-dia clearfix -->

        <div id="miercoles" class="contenido-dia clearfix">
          <h4>Miercoles</h4>
          <div>
            <p>Talleres: </p>
            <label><input type="checkbox" name="registro[]" id="taller_12" value="taller_12"><time>10:00</time> Laravel </label>
            <label><input type="checkbox" name="registro[]" id="taller_13" value="taller_13"><time>12:00</time> Crea tu propia API </label>
            <label><input type="checkbox" name="registro[]" id="taller_14" value="taller_14"><time>14:00</time> JavaScript & JQuery </label>
            <label><input type="checkbox" name="registro[]" id="taller_15" value="taller_15"><time>17:00</time> Creando plantillas para Wordpress </label>
            <label><input type="checkbox" name="registro[]" id="taller_16" value="taller_16"><time>19:00</time> Teindas virtuales en Magento </label>
          </div>
          <div>
            <p>Conferencias: </p>
            <label><input type="checkbox" name="registro[]" id="conf_07" value="conf_07"><time>10:00</time> Como hacer un marketing en línea </label>
            <label><input type="checkbox" name="registro[]" id="conf_08" value="conf_08"><time>17:00</time> ¿Con que lenguaje empezar? </label>
            <label><input type="checkbox" name="registro[]" id="conf_09" value="conf_09"><time>19:00</time> Framework y librerias OpenSource </label>
          </div>
          <div>
            <p>Seminarios: </p>
            <label><input type="checkbox" name="registro[]" id="sem_04" value="sem_04"><time>14:00</time> Creando una App en android en una tarde </label>
            <label><input type="checkbox" name="registro[]" id="sem_05" value="sem_05"><time>17:00</time> Creando una App en Ios en una tarde </label>
          </div>
        </div> <!-- #domingo contenido-dia clearfix -->

      </div> <!-- caja -->
    </div> <!-- #eventos eventos clearfix -->

    <div id="resumen" class="resumen">
      <h3>Pago y Extras</h3>
      <div class="caja clearfix">
        <div class="extras">
          <div class="orden">
            <label for="camisa_evento">Camisa del evento $10 <small>(Promoción -7% de descuento.)</small></label>
            <input type="number" min="0" id="camisa_evento" size="3" name="pedido_extra[camisas][cantidad]" placeholder="0">
            <input type="hidden" value="10" name="pedido_extra[camisas][precio]">
          </div> <!-- orden -->
          <div class="orden">
            <label for="etiquetas">Paquete de 10 etiquetas $2 <small>(HTML5, CSS3, JavaScript Chrome.)</small></label>
            <input type="number" min="0" id="etiquetas" size="3" name="pedido_extra[etiquetas][cantidad]" placeholder="0">
            <input type="hidden" value="2" name="pedido_extra[etiquetas][precio]">
          </div> <!-- orden -->
          <div class="orden">
            <label for="regalo">Seleccione un regalo</label><br>
            <select id="regalo" name="regalo" required>
              <option value="">-- Selecione un regalo --</option>
              <option value="2">Etiquetas</option>
              <option value="1">Pulseras</option>
              <option value="3">Plumas</option>
            </select> <!-- #regalo -->
          </div> <!-- orden -->

          <input type="button" id="calcular" class="button" value="Calcular">

        </div> <!-- extras -->

        <div class="total">
          <p>Resumen: </p>
          <div id="lista_productos">

          </div> <!-- #lista-productos -->

          <p>Total: </p>
          <div id="suma_total">

          </div> <!-- #suma-total -->
          <input type="submit" id="btnRegistro" name="submit" class="button" value="Pagar">
          <input type="hidden" name="total_pedido" id="total_pedido">
        </div> <!-- total -->
      </div> <!-- caja clearfix -->
    </div> <!-- #resumen resumen -->

  </form> <!-- #registro registro -->
</section> <!-- seccion contenedor -->

<?php include_once 'includes/templates/footer.php'; ?>