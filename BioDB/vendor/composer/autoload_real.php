<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitee8b51ce9c8b9893a4a9a46a6939da53
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInitee8b51ce9c8b9893a4a9a46a6939da53', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitee8b51ce9c8b9893a4a9a46a6939da53', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitee8b51ce9c8b9893a4a9a46a6939da53::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
