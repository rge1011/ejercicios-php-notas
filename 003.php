<?php
/**
 * Ejercicio 3: Analizador de texto
 */

$texto = "PHP no está muerto… solo sigue trabajando silenciosamente en el 80% de Internet";

echo "<strong>=== ANALIZADOR DE TEXTO ===</strong><br><br>";
echo "<strong>Texto original:</strong><br>";
echo "\"$texto\"<br><br>";

$textoMinusculas = strtolower($texto);
echo "<strong>Texto en minúsculas:</strong><br>";
echo "\"$textoMinusculas\"<br><br>";

$textoLimpio = preg_replace('/[^a-záéíóúñü\s]/u', '', $textoMinusculas);

$palabras = explode(" ", $textoLimpio);
$palabras = array_filter($palabras);

$palabrasFiltradas = array_filter($palabras, function($palabra) {
    return strlen(trim($palabra)) >= 3;
});

$totalPalabras = count($palabrasFiltradas);
echo "<strong>Total de palabras (≥ 3 letras):</strong> $totalPalabras<br><br>";

$frecuencias = array_count_values($palabrasFiltradas);
arsort($frecuencias);

echo "<strong>=== FRECUENCIA DE PALABRAS ===</strong><br>";
foreach ($frecuencias as $palabra => $veces) {
    echo "Palabra: <strong>$palabra</strong> → $veces veces<br>";
}

echo "<br><strong>=== PALABRAS REPETIDAS (&gt; 1 vez) ===</strong><br>";

$palabrasRepetidas = array_filter($frecuencias, function($veces) {
    return $veces > 1;
});

if (count($palabrasRepetidas) > 0) {
    foreach ($palabrasRepetidas as $palabra => $veces) {
        echo "Palabra: <strong>$palabra</strong> → $veces veces<br>";
    }
} else {
    echo "No hay palabras que se repitan más de una vez.<br>";
}

$palabraMasRepetida = array_key_first($frecuencias);
$maxRepeticiones = $frecuencias[$palabraMasRepetida];

echo "<br><strong>=== ANÁLISIS FINAL ===</strong><br>";
echo "Palabra más repetida: <strong>$palabraMasRepetida</strong><br>";
echo "Número de repeticiones: $maxRepeticiones<br>";
echo "Palabras únicas: " . count($frecuencias) . "<br>";
echo "Palabras totales analizadas: $totalPalabras<br>";