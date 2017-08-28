<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc9f403e9d38c013b836f43af5a4e88de
{
    public static $files = array (
        '4ba1167ff053aab3afcc2d28993cfca7' => __DIR__ . '/../..' . '/wire/core/ProcessWire.php',
    );

    public static $prefixLengthsPsr4 = array (
        'a' => 
        array (
            'atk4\\dsql\\' => 10,
            'atk4\\core\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'atk4\\dsql\\' => 
        array (
            0 => __DIR__ . '/..' . '/atk4/dsql/src',
        ),
        'atk4\\core\\' => 
        array (
            0 => __DIR__ . '/..' . '/atk4/core/src',
        ),
    );

    public static $classMap = array (
        'SqlFormatter' => __DIR__ . '/..' . '/jdorn/sql-formatter/lib/SqlFormatter.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc9f403e9d38c013b836f43af5a4e88de::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc9f403e9d38c013b836f43af5a4e88de::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc9f403e9d38c013b836f43af5a4e88de::$classMap;

        }, null, ClassLoader::class);
    }
}