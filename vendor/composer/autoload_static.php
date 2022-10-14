<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit528a55545f0a7ddd049b01bebe405073
{
    public static $files = array (
        '3b5531f8bb4716e1b6014ad7e734f545' => __DIR__ . '/..' . '/illuminate/support/Illuminate/Support/helpers.php',
        '2f8e4c8fcce7c49ca93c4fdebb718082' => __DIR__ . '/../..' . '/Core/Helpers/helper.php',
    );

    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'FiftyOnRed\\Blade\\' => 17,
        ),
        'C' => 
        array (
            'Core\\' => 5,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'FiftyOnRed\\Blade\\' => 
        array (
            0 => __DIR__ . '/..' . '/50onred/laravel-blade/src',
        ),
        'Core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Core',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static $prefixesPsr0 = array (
        'S' => 
        array (
            'Symfony\\Component\\Finder\\' => 
            array (
                0 => __DIR__ . '/..' . '/symfony/finder',
            ),
        ),
        'I' => 
        array (
            'Illuminate\\View' => 
            array (
                0 => __DIR__ . '/..' . '/illuminate/view',
            ),
            'Illuminate\\Support' => 
            array (
                0 => __DIR__ . '/..' . '/illuminate/support',
            ),
            'Illuminate\\Filesystem' => 
            array (
                0 => __DIR__ . '/..' . '/illuminate/filesystem',
            ),
            'Illuminate\\Events' => 
            array (
                0 => __DIR__ . '/..' . '/illuminate/events',
            ),
            'Illuminate\\Container' => 
            array (
                0 => __DIR__ . '/..' . '/illuminate/container',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit528a55545f0a7ddd049b01bebe405073::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit528a55545f0a7ddd049b01bebe405073::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit528a55545f0a7ddd049b01bebe405073::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit528a55545f0a7ddd049b01bebe405073::$classMap;

        }, null, ClassLoader::class);
    }
}