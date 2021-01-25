<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
</head>
<body>
	<h2>¡Mensaje de Compra Realizada </h2>
    <h2>Hola {{$user->name }}, gracias por realizar tú compra en <strong>MateriasPrimas</strong> !</h2>
    <h3>Acontinuación se lista la información de tú factura de compras hecha con la tarjeta numero {{$mediodepago->numero}}</h3>
    <p> Su numero de factura es: {{$factura->id}} Este numero le permitira hacer reclamos al sistema pasadas las 24/hrs sin respuesta</p>
    <p> Producto Nombre: {{$compra->nombre}} </p>
    <p> Cantidad Comprada: {{$compra->cantidadvendida}}</p>
    <p> Precio total: {{$compra->precio}}</p>

    <h4> Si hay algún problema con su factura de compra por favor comunicarse con nuestro telefono  {{$tienda->telefono}} Recuerda que los reclamos los debe hacer pasadas las 24/hrs sin recibir su pedido, ni haber realizado algún acuerdo con la tienda mediante correo electronico o telefonicamente</h4>

   
</body>
</html>