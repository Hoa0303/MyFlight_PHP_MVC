<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5345c079c0219c00b73dd7303bbad6cd
{
    public static $files = array (
        '277d33dcd817596bbf0ffc9dfdfeb88e' => __DIR__ . '/../..' . '/src/helpers.php',
    );

    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'B' => 
        array (
            'Bramus' => 
            array (
                0 => __DIR__ . '/..' . '/bramus/router/src',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit5345c079c0219c00b73dd7303bbad6cd::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5345c079c0219c00b73dd7303bbad6cd::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit5345c079c0219c00b73dd7303bbad6cd::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit5345c079c0219c00b73dd7303bbad6cd::$classMap;

        }, null, ClassLoader::class);
    }
}
