<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitcc2e3db6c9729ed664326484a635602f
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

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitcc2e3db6c9729ed664326484a635602f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitcc2e3db6c9729ed664326484a635602f::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}