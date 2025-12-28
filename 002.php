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
    
    return [
        'porcentaje' => $porcentaje,
        'monto' => $monto
    ];
}

echo "=== CARRITO DE COMPRAS ===\n\n";
echo str_pad("PRODUCTO", 20) . str_pad("PRECIO", 12) . str_pad("CANTIDAD", 12) . 
     str_pad("SUBTOTAL", 12) . "\n";
echo str_repeat("=", 56) . "\n";

foreach ($carrito as $item) {
    $subtotal = $item['precio'] * $item['cantidad'];
    
    echo str_pad($item['producto'], 20);
    echo str_pad(number_format($item['precio'], 2) . " €", 12);
    echo str_pad($item['cantidad'], 12);
    echo str_pad(number_format($subtotal, 2) . " €", 12);
    echo "\n";
}

echo str_repeat("-", 56) . "\n";

$totalSinDescuento = calcularTotal($carrito);
$descuento = calcularDescuento($totalSinDescuento);
$totalFinal = $totalSinDescuento - $descuento['monto'];

echo "\n=== RESUMEN DE COMPRA ===\n";
echo "Subtotal: " . number_format($totalSinDescuento, 2) . " €\n";

if ($descuento['porcentaje'] > 0) {
    echo "Descuento aplicado: " . $descuento['porcentaje'] . "% (-" . 
         number_format($descuento['monto'], 2) . " €)\n";
} else {
    echo "Sin descuento aplicado\n";
}

echo str_repeat("=", 40) . "\n";
echo "TOTAL FINAL: " . number_format($totalFinal, 2) . " €\n";
?>