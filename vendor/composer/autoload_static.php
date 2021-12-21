<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit00d3f6253ac5f458d211a722b1565531
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Shiban\\Instabot\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Shiban\\Instabot\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit00d3f6253ac5f458d211a722b1565531::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit00d3f6253ac5f458d211a722b1565531::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit00d3f6253ac5f458d211a722b1565531::$classMap;

        }, null, ClassLoader::class);
    }
}