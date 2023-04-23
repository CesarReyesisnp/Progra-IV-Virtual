<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcular Pago</title>
</head>
<body>

<h1>Calcular Total a Pagar</h1>
    <form action="procesar_datos_pago.php" method="POST">

        <label for="txtarticulo">ARTICULO: </label> 
        <input type="text" name="txtarticulo" id="txtarticulo" 
        required title="Por favor coloque el nombre de su producto">
        <br>
        <br>

        <label for="txtcantidad">CANTIDAD: </label> 
        <input type="number" name="txtcantidad" id="txtcantidad" 
        required title="Por favor coloque la cantidad de articulos que lleva">
        <br>
        <br>

        <label for="txtprecio">PRECIO: </label> 
        <input type="text" name="txtprecio" id="txtprecio" 
        required title="Por favor coloque el costo unitario del articulo"> 
        <br>
        <br>

        <input type="submit" value="CALCULAR PAGO $">

    </form>
</body>
</html>