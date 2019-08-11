<?php include_once 'includes/templates/header.php'; ?>

<section class="seccion contenedor">
    <h2>Calendario de eventos</h2>
    
    <?php
    
    try{
        require_once 'includes/funciones/bd_conexion.php';
        $sql = "call calendario();";
        $resultado = $conn -> query($sql);
    }catch(\Exception $e){
        echo $e -> getMessage();
    }
    
    ?>
    
    <div class="calendario">
       
        <?php 
        
        $calendario = array();
        while( $eventos = $resultado -> fetch_assoc() ){ 
            
            //Obtiene la fecha del evento
            $fecha = $eventos['fecha_evento'];
        
            $evento = array(
                'titulo' => $eventos['nombre_evento'],
                'fecha' => $eventos['fecha_evento'],
                'hora' => $eventos['hora_evento'],
                'categoria' => $eventos['cat_evento'],
                'icono' => 'fa' . " " . $eventos['icono'],
                'invitado' => $eventos['nombre_invitado'] . " " . ['apellido_invitado']   
            );
            
            $calendario[$fecha][] = $evento;
            
        ?>
        
        <?php } //While de fetch_assco() ?>
        
        <?php 
        
            //Imprime todos los eventos
            foreach($calendario as $dia => $lista_eventos) { ?>
            
            <h3>
                <i class="fa fa-calendar"></i>
                
                <?php 
                
                //Formatear fecha
                setlocale(LC_TIME, 'spanish');                                            
                echo strftime("%A, %d de %B del %Y", strtotime($dia))?>
            </h3>
            
            <?php 
                
                foreach($lista_eventos as $evento) { ?>
                   
                <div class="dia">
                   
                    <p class="titulo"><?php echo $evento['titulo']; ?></p> <!-- .titulo -->
                    <p class="hora">
                        <i class="fas fa-clock" aria-hidden="true"></i>
                        <?php echo $evento['fecha'] . " " . $evento['hora']; ?>
                    </p> <!-- .hora -->
                    <p>
                        <i class="<?php echo $evento['icono']; ?>" aria-hidden="true"></i>
                        <?php echo $evento['categoria']; ?>
                    </p>
                    <p>
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <?php echo $evento['invitado']; ?>
                    </p>
                        
                </div> <!-- .dia -->
                    
            <?php } //Fin foreach eventos ?>
            
        <?php } //Fin foreach dias ?>
        
    </div>
    
    <?php $conn -> close(); ?>
    
</section> <!-- seccion -->

<?php include_once 'includes/templates/footer.php'; ?>