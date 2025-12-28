<?php
/**
 * Ejercicio 3: Analizador de texto
 */

$texto = "PHP no está muerto… solo sigue trabajando silenciosamente en el 80% de Internet";

echo "=== ANALIZADOR DE TEXTO ===\n\n";
echo "Texto original:\n\"$texto\"\n\n";

$textoMinusculas = strtolower($texto);
echo "Texto en minúsculas:\n\"$textoMinusculas\"\n\n";

$textoLimpio = preg_replace('/[^a-záéíóúñü\s]/u', '', $textoMinusculas);

$palabras = explode(" ", $textoLimpio);
$palabras = array_filter($palabras);

$palabrasFiltradas = array_filter($palabras, function($palabra) {
    return strlen(trim($palabra)) >= 3;
});

$totalPalabras = count($palabrasFiltradas);
echo "Total de palabras (≥3 letras): $totalPalabras\n\n";

$frecuencias = array_count_values($palabrasFiltradas);
arsort($frecuencias);

echo "=== FRECUENCIA DE PALABRAS ===\n";
echo str_pad("PALABRA", 25) . "APARICIONES\n";
echo str_repeat("-", 40) . "\n";

foreach ($frecuencias as $palabra => $veces) {
    echo str_pad($palabra, 25) . $veces . "\n";
}

echo "\n=== PALABRAS REPETIDAS (>1 vez) ===\n";
$palabrasRepetidas = array_filter($frecuencias, function($veces) {
    return $veces > 1;
});

if (count($palabrasRepetidas) > 0) {
    echo str_pad("PALABRA", 25) . "APARICIONES\n";
    echo str_repeat("-", 40) . "\n";
    
    foreach ($palabrasRepetidas as $palabra => $veces) {
        echo str_pad($palabra, 25) . $veces . "\n";
    }
} else {
    echo "No hay palabras que se repitan más de una vez.\n";
}

$palabraMasRepetida = array_key_first($frecuencias);
$maxRepeticiones = $frecuencias[$palabraMasRepetida];

echo "\n=== ANÁLISIS FINAL ===\n";
echo "Palabra más repetida: \"$palabraMasRepetida\"\n";
echo "Número de repeticiones: $maxRepeticiones\n";
echo "Palabras únicas: " . count($frecuencias) . "\n";
echo "Palabras totales analizadas: $totalPalabras\n";
?>