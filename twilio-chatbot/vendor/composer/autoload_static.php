<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit665a35a89af98b9256b7f3830a46b8fc
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Twilio\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Twilio\\' => 
        array (
            0 => __DIR__ . '/..' . '/twilio/sdk/src/Twilio',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit665a35a89af98b9256b7f3830a46b8fc::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit665a35a89af98b9256b7f3830a46b8fc::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit665a35a89af98b9256b7f3830a46b8fc::$classMap;

        }, null, ClassLoader::class);
    }
}
