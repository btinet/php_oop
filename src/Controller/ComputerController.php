<?php

namespace App\Controller;

use App\View\Component\ComponentInterface;
use App\View\Component\Headline;
use App\View\Component\Paragraph;

class ComputerController extends AbstractController
{

    public function index (): void
    {
        $h1 = new Headline(text: "Übersicht der Computer");
        $h1->setHeadlineType(ComponentInterface::H1);
       
        $p1 = new Paragraph(text: "Dies ist ein spannender Abstaz, der eigentlich nicht wirklich etwas thematisiert.");

        echo $h1->render();
        echo $p1->render();
    }

    public function show (): void
    {
        $h1 = new Headline(text: "MacBook genauer betrachten");
        $h1->setHeadlineType(ComponentInterface::H1);
       
        $p1 = new Paragraph(text: "Werfen wir einen Blick auf das MacBook!");
        echo $h1->render();
        echo $p1->render();
    }

    // TODO: Methode in Oberklasse implementieren, die das Grundgerüst rendert und die erzeugten Elemente entgegennimmt.


}
