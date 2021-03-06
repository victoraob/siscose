<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitcd29a5b31807014639f859552454fc78
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitcd29a5b31807014639f859552454fc78::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitcd29a5b31807014639f859552454fc78::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitcd29a5b31807014639f859552454fc78::$classMap;

        }, null, ClassLoader::class);
    }
}
