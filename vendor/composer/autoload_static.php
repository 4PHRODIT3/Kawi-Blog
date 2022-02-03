<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit729f42a106d64e95b6d5a5b67b0eb8e7
{
    public static $classMap = array (
        'App' => __DIR__ . '/../..' . '/core/App.php',
        'ArticleController' => __DIR__ . '/../..' . '/core/Controllers/ArticleController.php',
        'Authentication' => __DIR__ . '/../..' . '/core/Auth/Authentication.php',
        'Authorization' => __DIR__ . '/../..' . '/core/Auth/Authorization.php',
        'CategoryController' => __DIR__ . '/../..' . '/core/Controllers/CategoryController.php',
        'ComposerAutoloaderInit729f42a106d64e95b6d5a5b67b0eb8e7' => __DIR__ . '/..' . '/composer/autoload_real.php',
        'Composer\\Autoload\\ClassLoader' => __DIR__ . '/..' . '/composer/ClassLoader.php',
        'Composer\\Autoload\\ComposerStaticInit729f42a106d64e95b6d5a5b67b0eb8e7' => __DIR__ . '/..' . '/composer/autoload_static.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Connection' => __DIR__ . '/../..' . '/core/Database/Connection.php',
        'HomeController' => __DIR__ . '/../..' . '/core/Controllers/HomeController.php',
        'QueryBuilder' => __DIR__ . '/../..' . '/core/Database/QueryBuilder.php',
        'Router' => __DIR__ . '/../..' . '/core/Router.php',
        'UserController' => __DIR__ . '/../..' . '/core/Controllers/UserController.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit729f42a106d64e95b6d5a5b67b0eb8e7::$classMap;

        }, null, ClassLoader::class);
    }
}
