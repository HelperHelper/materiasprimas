<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
</head>
<body>
	<h2>¡Mensaje de Venta Realizada </h2>
    <h2>Hola {{$tienda->name }}, te informamos que haz hecho una venta en <strong>MateriasPrimas</strong> !</h2>
    <h3>Acontinuación se lista la información de tú Venta hecha el día {{$factura->created_at}}</h3>
    <p> El numero de factura es: {{$factura->id}} Este numero le permitira hacer reclamos al sistema pasadas las 24/hrs sin respuesta tengalo en cuenta</p>
    <p> Producto Nombre: {{$compra->nombre}} </p>
    <p> Cantidad vendida: {{$compra->cantidadvendida}}</p>
    <p> Precio total: {{$compra->precio}}</p>
    <p> Nombre de usuario que compro: {{$user->name}} {{$user->Apellido}}</p>
    <p> Email de comprador: {{$user->email}} </p>
    <p> Telefono de contacto del usuario: {{$user->telefono}}</p>


    <h4> Si hay algún problema con su venta comuniquese con el encargado de nuestra plataforma</h4>

   
</body>
</html>