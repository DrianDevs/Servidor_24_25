<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit967a9e5237b7d7ee9c9594866a9cec05
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Psr\\Log\\' => 8,
        ),
        'M' => 
        array (
            'Monolog\\' => 8,
        ),
        'D' => 
        array (
            'Driandevs\\ProyectoVideoclub\\' => 28,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/src',
        ),
        'Monolog\\' => 
        array (
            0 => __DIR__ . '/..' . '/monolog/monolog/src/Monolog',
        ),
        'Driandevs\\ProyectoVideoclub\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit967a9e5237b7d7ee9c9594866a9cec05::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit967a9e5237b7d7ee9c9594866a9cec05::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit967a9e5237b7d7ee9c9594866a9cec05::$classMap;

        }, null, ClassLoader::class);
    }
}
