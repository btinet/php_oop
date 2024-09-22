<?php

namespace App\Controller;

use App\Entity\Laptop;
use App\View\Component\Headline;
use App\View\Component\HeadlineType;
use App\View\Component\Hyperlink;
use App\View\Component\Paragraph;
use App\View\Page\Computer\ComputerIndex;
use App\View\TwitterBootstrap\Container;
use App\View\TwitterBootstrap\FontWeight;

class ComputerController extends AbstractController
{
    /*
     * Ein Controller dient dazu, Daten vom Model zu verarbeiten und die View entsprechend anzupassen.
     * Der Controller ist jedoch weder dafür zuständig, wie die Daten gespeichert oder abgerufen werden, noch
     * kümmert er sich um die Aus- oder Eingabe der optischen Schicht.
     */

    public function index (): string
    {
        $this->title->add("Übersicht",'text');

        $view = new ComputerIndex();

        $this->root->add($view->render());

        return $this->render();
    }

    public function show (): string
    {
        $h1 = new Headline("MacBook genauer betrachten");
        $h1->setHeadlineType(HeadlineType::H1);
       
        $p1 = new Paragraph("Werfen wir einen Blick auf das MacBook! ");

        // Methode zum Generieren von Hyperlinks
        $link = $this->url(
            class: ComputerController::class,
            method: "index"
            );

        $p1->add(new Hyperlink("Zur Übersicht",$link));

        $container = new Container();
        $container
            ->add($h1)
            ->add($p1)
        ;

        // Wir erzeugen ein neues Objekt vom Datentyp "Laptop".
        $macBook = new Laptop();

        // Unser MacBook bekommt natürlich 16 GB Arbeitsspeicher.
        $macBook->setMemory(16);

        // Die Beschreibung für den Arbeitsspeicher weisen wir einer lokalen Variable zu.
        $macBookDescription = "Das Macbook hat {$macBook->getMemory(true)} Arbeitsspeicher.";

        // Die Beschreibung soll als Absatz dargestellt werden
        $descriptionParagraph = new Paragraph($macBookDescription);
        // Und der Text soll kursiv sein. Also fügen wir dem Attribut "class" die entsprechende css-Klasse hinzu.
        $descriptionParagraph->addAttribute('class',[FontWeight::STYLE_ITALIC]);

        // Der Absatz wird dem Container-Element angehängt.
        $container->add($descriptionParagraph);

        $this->root->add($container);

        return $this->render();
    }

}
