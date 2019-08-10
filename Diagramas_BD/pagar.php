<?php 

ini_set("display_errors", "1");
error_reporting(E_ALL);

// Si las variables no han sido seteadas
if(!isset($_POST['submit'])){
	exit("Hubo un error");
}

// Usamos el namespace
use PayPal\Api\Payer;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Details;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;

// Agregamos la configuración
require 'includes/paypal.php';

if(isset($_POST['submit'])):
		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$email = $_POST['email'];
		$regalo = $_POST['regalo'];
		$total = $_POST['total_pedido'];
		$fecha = date('Y-m-d H:i:s');
		//Pedidos
		$boletos = $_POST['boletos'];
		$numero_boletos = $boletos;
		$pedidoExtra = $_POST['pedido_extra'];
		$camisas = $_POST['pedido_extra']['camisas']['cantidad'];
		$precioCamisa = $_POST['pedido_extra']['camisas']['precio'];
		$etiquetas = $_POST['pedido_extra']['etiquetas']['cantidad'] ;
		$precioEtiquetas = $_POST['pedido_extra']['etiquetas']['precio'];
		include_once 'includes/funciones/funciones.php';
		// Me retornara valores de la función y lo almacenaremos en una variable
		$pedido = productos_json($boletos, $camisas, $etiquetas);
		$eventos = $_POST['registro'];
		$registro = eventos_json($eventos);

		try{
			require_once ('includes/funciones/bd_conexion.php');
			$stmt = $conn -> prepare("insert into registrados (nombre_registrado, apellido_registrado, email_registrado, fecha_registro, 							 pases_articulos, talleres_registrados, regalo, total_pagado) values (?, ?, ?, ?, ?, ?, ?, ?)");
			$stmt -> bind_param("ssssssis", $nombre, $apellido, $email, $fecha, $pedido, $registro, $regalo, $total);
			$stmt -> execute();
			$ID_registro = $stmt -> insert_id;
			$stmt -> close();
			$conn -> close();
		} catch (Exception $e){
			$error = $e -> getMessage();
		}
endif;

// Instanciamos la clase Payer
$compra = new Payer();
// Agregamos el valor de paypal
$compra -> setPaymentMethod('paypal');

$i = 0;
$arreglo_pedido = array();
foreach($numero_boletos as $key => $value){
	if( (int) $value['cantidad'] > 0 ){
		${"articulo$i"} = new Item();
		$arreglo_pedido[] = ${"articulo$i"};
		${"articulo$i"} -> setName('Pase: ' . $key) -> setCurrency('MXN') -> setQuantity( (int) $value['cantidad'] ) 										-> setPrice( (int) $value['precio'] );
		$i++;
	}
}

foreach($pedidoExtra as $key => $value){
	if( (int) $value['cantidad'] > 0 ){
		
		if($key == 'camisas'){
			$precio = (float) $value['precio'] * .93;
		}
		else{
			$precio = (int) $value['precio'];
		}	
		
		${"articulo$i"} = new Item();
		$arreglo_pedido[] = ${"articulo$i"};
		${"articulo$i"} -> setName('Extras: ' . $key) -> setCurrency('MXN') -> setQuantity( (int) $value['cantidad'] ) 										-> setPrice( $precio );
		$i++;
	}
}

// Instanciamos la clase ItemList
$listaArticulo = new ItemList();
// Agregamos al arreglo el o los articulos 
$listaArticulo -> setItems($arreglo_pedido);


// Instanciamos la clase Amount
$cantidad = new Amount();
// Agregamos la moneda, el total y los detalles de la compra
$cantidad -> setCurrency('MXN') -> setTotal($total);

// Instanciamos la clase de Transaction
$transaccion = new Transaction();
// Agregamos la cantidad, la lista de articulos, el pago y el id de la persona que esta comprando
$transaccion -> setAmount($cantidad) -> setItemList($listaArticulo) -> setDescription('Pago Jizatec Conferences') 										 -> setInvoiceNumber($ID_registro);

// Instanciamos la clase RedirectUrls
$redireccionar = new RedirectUrls();
// Agregamos los url redireccionando al pago efectuado
$redireccionar -> setreturnUrl(URL_SITIO . "pago_finalizado.php?&id_pago{$ID_registro}") 
			   -> setCancelUrl(URL_SITIO . "pago_finalizado.php?&id_pago{$ID_registro}");

// Instanciamos la clase Payment
$pago = new Payment();
// Agregamos la venta, la compra, las url y la transacción de la compra
$pago -> setIntent("sale") -> setPayer($compra) -> setRedirectUrls($redireccionar) -> setTransactions(array($transaccion));

try{
	$pago -> create($apiContext);
} catch(PayPal\Exception\PayPalConnectionException $pce){
	echo "<pre>";
	print_r(json_encode($pce -> getData()));
	exit;
	echo "</pre>";
}

$aprobado = $pago -> getApprovalLink();

header("Location: {$aprobado}");

?>