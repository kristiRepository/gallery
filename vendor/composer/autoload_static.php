<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit046f2b9bc03f5af5f346c05cd309c3b0
{
    public static $classMap = array (
        'Album' => __DIR__ . '/../..' . '/database/Album.php',
        'AlbumController' => __DIR__ . '/../..' . '/Controllers/AlbumController.php',
        'ComposerAutoloaderInit046f2b9bc03f5af5f346c05cd309c3b0' => __DIR__ . '/..' . '/composer/autoload_real.php',
        'Composer\\Autoload\\ClassLoader' => __DIR__ . '/..' . '/composer/ClassLoader.php',
        'Composer\\Autoload\\ComposerStaticInit046f2b9bc03f5af5f346c05cd309c3b0' => __DIR__ . '/..' . '/composer/autoload_static.php',
        'Connection' => __DIR__ . '/../..' . '/database/Connection.php',
        'Photo' => __DIR__ . '/../..' . '/database/Photo.php',
        'PhotoController' => __DIR__ . '/../..' . '/Controllers/PhotoController.php',
        'Request' => __DIR__ . '/../..' . '/Request.php',
        'Router' => __DIR__ . '/../..' . '/Router.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit046f2b9bc03f5af5f346c05cd309c3b0::$classMap;

        }, null, ClassLoader::class);
    }
}
