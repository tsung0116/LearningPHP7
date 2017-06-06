<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita3cc57048f86c7ac4fc6972a1771bae6
{
    public static $prefixLengthsPsr4 = array (
        'B' => 
        array (
            'Bookstore\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Bookstore\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita3cc57048f86c7ac4fc6972a1771bae6::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita3cc57048f86c7ac4fc6972a1771bae6::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
