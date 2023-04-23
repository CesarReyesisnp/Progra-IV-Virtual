<?php

$articulo = $_POST['txtarticulo'];
$cantidad =$_POST['txtcantidad'] ;
$precio = $_POST['txtprecio'];
$subtotal = $cantidad * $precio;
$cesc = $subtotal * 0.05;
$iva = $subtotal * 0.13;
$total = $cesc + $iva + $subtotal;

echo "Articulo:  $articulo;  Cantidad:  $cantidad;  Precio :$  $precio; 
Subtotal :$ $subtotal; Impuesto CESC :$ $cesc; Impuesto IVA :$ $iva; 
Su Total a Pagar es de :$ $total ";


?>