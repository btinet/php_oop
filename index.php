<?php

use App\Bootstrap;

// Autoload laden
require_once __DIR__.'/vendor/autoload.php';

    /* Selbstgebauter Autoloader:

        const DS = DIRECTORY_SEPARATOR;
        const ROOT_DIRECTORY = __DIR__ . DIRECTORY_SEPARATOR;

        function customAutoloader( $class )
        {
            $classPath = str_replace('\\', '/', $class);
            $classPath = substr($classPath,3); // 'App' am Anfang entfernen, da der Ordner 'src' heißt.

            $file = ROOT_DIRECTORY . 'src' . DS . $classPath.  '.php';

            if ( file_exists($file) ) {
                require_once $file;
            }
        }

        spl_autoload_register( 'customAutoloader' );

    */

// App starten
$app = new Bootstrap();
