<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit615ee828a7cfce9a9ae11a7c958c2303
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Taniko\\Dijkstra\\' => 16,
        ),
        'F' => 
        array (
            'Fisharebest\\Algorithm\\' => 22,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Taniko\\Dijkstra\\' => 
        array (
            0 => __DIR__ . '/..' . '/taniko/dijkstra/src',
        ),
        'Fisharebest\\Algorithm\\' => 
        array (
            0 => __DIR__ . '/..' . '/fisharebest/algorithm/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit615ee828a7cfce9a9ae11a7c958c2303::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit615ee828a7cfce9a9ae11a7c958c2303::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
