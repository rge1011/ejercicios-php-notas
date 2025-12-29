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

echo "<strong>-- GESTOR DE NOTAS DE ESTUDIANTES --</strong><br><br>";

foreach ($estudiantes as $nombre => $notas) {
    $promedio = calcularPromedio($notas);
    $estado = $promedio >= 6 ? "Aprobado" : "Suspenso";

    echo "Estudiante: $nombre<br>";
    echo "Notas: " . implode(", ", $notas) . "<br>";
    echo "Promedio: " . number_format($promedio, 2) . "<br>";
    echo "Estado: $estado<br>";
    echo "----------------------------------------<br>";

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

echo "<br><strong>--- RESUMEN FINAL ---</strong><br>";
echo "Total de estudiantes: " . count($estudiantes) . "<br>";
echo "Aprobados: $aprobados<br>";
echo "Suspendidos: $suspendidos<br>";
echo "<br>Mejor estudiante: $mejorEstudiante con promedio de " .
     number_format($mejorPromedio, 2) . "<br>";