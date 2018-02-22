<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitfbe09fb3ba3fa14657a843fd385524f3
{
    public static $prefixLengthsPsr4 = array (
        'I' => 
        array (
            'Inc\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Inc\\' => 
        array (
            0 => __DIR__ . '/../..' . '/inc',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitfbe09fb3ba3fa14657a843fd385524f3::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitfbe09fb3ba3fa14657a843fd385524f3::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
