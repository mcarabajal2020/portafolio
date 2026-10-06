<?php

// Ejecutar desde la raíz del proyecto: php fix-storage.php
// Crea el symlink public/storage sin usar exec() (Hostinger lo bloquea).

$base = __DIR__;
$public = $base.'/public';
$target = $base.'/storage/app/public';
$link = $public.'/storage';

$dirs = [
    $target,
    $target.'/images/featureds',
    $target.'/livewire-tmp',
    $base.'/storage/app/private',
    $base.'/storage/framework/cache/data',
    $base.'/storage/framework/sessions',
    $base.'/storage/framework/views',
];

foreach ($dirs as $dir) {
    if (! is_dir($dir)) {
        mkdir($dir, 0775, true);
        echo "Creado: {$dir}\n";
    } else {
        echo "Existe: {$dir}\n";
    }
}

@chmod($target, 0775);
@chmod($target.'/images/featureds', 0775);
@chmod($target.'/livewire-tmp', 0775);

if (file_exists($link) || is_link($link)) {
    if (is_link($link)) {
        $current = readlink($link);
        if ($current === $target) {
            echo "Symlink ya correcto: public/storage -> {$target}\n";
        } else {
            unlink($link);
            symlink($target, $link);
            echo "Symlink recreado: public/storage -> {$target} (antes: {$current})\n";
        }
    } else {
        echo "ATENCION: public/storage existe y NO es un symlink. No lo toco.\n";
        echo "Si es una carpeta con archivos, revisala a mano.\n";
    }
} else {
    if (@symlink($target, $link)) {
        echo "Symlink creado: public/storage -> {$target}\n";
    } else {
        echo "No pude crear el symlink con symlink().\n";
        echo "Probá desde el Administrador de Archivos de Hostinger:\n";
        echo "  1. Andá a public/\n";
        echo "  2. Crear enlace simbólico\n";
        echo "  3. Nombre: storage\n";
        echo "  4. Destino: {$target}\n";
        echo "  (o ruta relativa: ../storage/app/public)\n";
    }
}

// Test de escritura
$test = $target.'/livewire-tmp/write-test.txt';
if (@file_put_contents($test, 'ok') !== false) {
    echo "Escritura en livewire-tmp: OK\n";
    @unlink($test);
} else {
    echo "Escritura en livewire-tmp: FALLA (permisos)\n";
}

echo "\nListo. Recargá el admin y probá subir la imagen.\n";
