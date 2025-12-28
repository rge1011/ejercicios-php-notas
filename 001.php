<?php
/**
 * Ejercicio 1: Gestor de notas de estudiantes
 */

$estudiantes = [
    "Ana" => [8, 7, 9],
    "Luis" => [5, 6, 4],
    "María" => [10, 9, 10],
    "Carlos" => [6, 6, 6]
];

function calcularPromedio($notas) {
    $suma = array_sum($notas);
    $cantidad = count($notas);
    return $cantidad > 0 ? $suma / $cantidad : 0;
}

$aprobados = 0;
$suspendidos = 0;
$mejorEstudiante = "";
$mejorPromedio = 0;

echo "=== GESTOR DE NOTAS DE ESTUDIANTES ===\n\n";

foreach ($estudiantes as $nombre => $notas) {
    $promedio = calcularPromedio($notas);
    $estado = $promedio >= 6 ? "Aprobado" : "Suspenso";
    
    echo "Estudiante: $nombre\n";
    echo "Notas: " . implode(", ", $notas) . "\n";
    echo "Promedio: " . number_format($promedio, 2) . "\n";
    echo "Estado: $estado\n";
    echo str_repeat("-", 40) . "\n";
    
    if ($promedio >= 6) {
        $aprobados++;
    } else {
        $suspendidos++;
    }
    
    if ($promedio > $mejorPromedio) {
        $mejorPromedio = $promedio;
        $mejorEstudiante = $nombre;
    }
}

echo "\n=== RESUMEN FINAL ===\n";
echo "Total de estudiantes: " . count($estudiantes) . "\n";
echo "Aprobados: $aprobados\n";
echo "Suspendidos: $suspendidos\n";
echo "\nMejor estudiante: $mejorEstudiante con promedio de " . 
     number_format($mejorPromedio, 2) . "\n";
?>