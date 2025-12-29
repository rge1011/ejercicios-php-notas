<?php
/**
 * Ejercicio 2: Simulador de carrito de compras
 */

$carrito = [
    ["producto" => "Portátil", "precio" => 1200, "cantidad" => 1],
    ["producto" => "Ratón", "precio" => 25, "cantidad" => 2],
    ["producto" => "Teclado", "precio" => 45, "cantidad" => 1],
];

function calcularTotal($carrito) {
    $total = 0;
    foreach ($carrito as $item) {
        $total += $item['precio'] * $item['cantidad'];
    }
    return $total;
}

function calcularDescuento($total) {
    if ($total > 1000) {
        $porcentaje = 10;
    } elseif ($total > 500) {
        $porcentaje = 5;
    } else {
        $porcentaje = 0;
    }

    $monto = $total * ($porcentaje / 100);

    return [$porcentaje, $monto];
}

echo "<strong>-- CARRITO DE COMPRAS --</strong><br><br>";

foreach ($carrito as $item) {
    $subtotal = $item['precio'] * $item['cantidad'];

    echo "Producto: {$item['producto']}<br>";
    echo "Precio: " . number_format($item['precio'], 2) . " €<br>";
    echo "Cantidad: {$item['cantidad']}<br>";
    echo "Subtotal: " . number_format($subtotal, 2) . " €<br>";
    echo "--------------------------<br>";
}

$total = calcularTotal($carrito);
list($porcentaje, $monto) = calcularDescuento($total);
$totalFinal = $total - $monto;

echo "<br><strong>--- RESUMEN DE COMPRA ---</strong><br>";
echo "Total sin descuento: " . number_format($total, 2) . " €<br>";

if ($porcentaje > 0) {
    echo "Descuento aplicado: {$porcentaje}% (-" . number_format($monto, 2) . " €)<br>";
} else {
    echo "Sin descuento aplicado<br>";
}

echo "<strong>TOTAL FINAL: " . number_format($totalFinal, 2) . " €</strong><br>";