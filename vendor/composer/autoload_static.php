<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc0bcafaf312d096079120b45fe026578
{
    public static $files = array (
        '340134824c8f401cc69ec3aaecf7be6f' => __DIR__ . '/../..' . '/config.php',
    );

    public static $prefixLengthsPsr4 = array (
        'c' => 
        array (
            'core\\' => 5,
        ),
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/core',
        ),
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc0bcafaf312d096079120b45fe026578::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc0bcafaf312d096079120b45fe026578::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc0bcafaf312d096079120b45fe026578::$classMap;

        }, null, ClassLoader::class);
    }
}
