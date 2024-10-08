# PHP Projekt zur Erlernung objektorientierter Programmierung

Dieses Projekt orientiert sich an der OOP-Struktur von `Java Swing`, in dem
alle HTML-Elemente und Styles als Objekte angewendet werden.

Da HTML-Elemente immer Kind- sowie Elternelemente aufweisen, können jedem
HTML-Objekt ebenso Kindelemente hinzugefügt werden. Die Flexibilität des Projekts
lässt es aber ebenso zu, nicht-Objekt-Kontext zu verwenden:

Beispiel für das Hinzufügen von Elementen zum Body-Tag (`$root`):

````php
<?php

namespace App\Controller;

use App\View\Component\Headline;
use App\View\Component\Paragraph;
use App\View\TwitterBootstrap\Container;

class Controller extends AbstractController
{

    public function index (): string
    {        
        $h1 = new Headline("Überschrift");
        $paragraph = new Paragraph("Dies ist ein Absatz.");
        
        $container = new Container();
        $container->add($h1);
        $container->add($paragraph);
        
        $this->root->add($container);        
        return $this->root->render();
    }

}

````
erzeugt die Ausgabe:
````html
<body>
    <div class="container">
        <h1>Überschrift</h1>
        <p>Dies ist ein Absatz.</p>
    </div>    
</body>

````

Da in der Klasse ``AbstractController`` bereits die Grundstruktur des HTML-Dokuments
implementiert ist, kann auch das gesamte Dokument gerendert werden, ohne jedes Mal
für die aktuelle Seite nicht-relevante Aufgaben redundant durchführen zu müssen.
Dies geschieht, indem direkt ``$this->render()`` aufgerufen wird.

````php
<?php

namespace App\Controller;

use App\View\Component\Headline;
use App\View\Component\Paragraph;
use App\View\TwitterBootstrap\Container;

class Controller extends AbstractController
{

    public function index (): string
    {        
        $h1 = new Headline("Überschrift");
        $paragraph = new Paragraph("Dies ist ein Absatz.");
        
        $container = new Container();
        $container->add($h1);
        $container->add($paragraph);       
                
        $this->root->add($container);   
             
        return $this->render();
    }

}

````
erzeugt die Ausgabe:
````html
<!DOCTYPE html>
<html lang='de'>
    <head>
        <meta name='charset' content='UTF-8'>    
        <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no'>
        <title>Übersicht</title>
        <link rel='stylesheet' href='path/to/style.css'>
    </head>
    <body>
        <div class='container'>
            <h1>Überschrift</h1>
            <p>Dies ist ein Absatz.</p>
        </div>
        <script src='path/to/javascript.js'></script>
    </body>
</html>
````

````shell
composer require mikehaertl/php-pdftk
````