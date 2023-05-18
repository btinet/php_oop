<?php

namespace App\Controller;

use App\View\Component\ComponentInterface;
use App\View\Component\Headline;
use App\View\Component\Hyperlink;
use App\View\Component\Paragraph;

class ComputerController extends AbstractController
{

    public function index (): void
    {
        $h1 = new Headline(text: "Übersicht der Computer");
        $h1->setHeadlineType(ComponentInterface::H1);
       
        $p1 = new Paragraph(text: "Dies ist ein spannender Abstaz, der eigentlich nicht wirklich etwas thematisiert. ");
        $p1->add(new Hyperlink(text: "MacBook ansehen", href: "?controller=computer&action=show"));

        echo $h1->render();
        echo $p1->render();
    }

    public function show (): void
    {
        $h1 = new Headline(text: "MacBook genauer betrachten");
        $h1->setHeadlineType(ComponentInterface::H1);
       
        $p1 = new Paragraph(text: "Werfen wir einen Blick auf das MacBook! ");
        $p1->add(new Hyperlink(text: "Zur Übersicht",href: "?controller=computer&action=index"));

        echo $h1->render();
        echo $p1->render();
    }

    // TODO: Methode in Oberklasse implementieren, die das Grundgerüst rendert und die erzeugten Elemente entgegennimmt.


}
