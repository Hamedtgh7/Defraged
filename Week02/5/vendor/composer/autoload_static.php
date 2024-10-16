<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9c1b0e15eabf5f9ec44a02efd33b2209
{
    public static $prefixLengthsPsr4 = array (
        't' => 
        array (
            'trip\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'trip\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit9c1b0e15eabf5f9ec44a02efd33b2209::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit9c1b0e15eabf5f9ec44a02efd33b2209::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit9c1b0e15eabf5f9ec44a02efd33b2209::$classMap;

        }, null, ClassLoader::class);
    }
}
