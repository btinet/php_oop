<?php

namespace App\Controller;

use App\Model\Request;
use App\View\Component\ComponentInterface;
use App\View\Component\Headline;
use App\View\Component\Hyperlink;
use App\View\Component\Paragraph;

class ComputerController extends AbstractController
{

    public function index (): void
    {
        $h1 = new Headline("Übersicht der Computer");
        $h1->setHeadlineType(ComponentInterface::H1);
       
        $p1 = new Paragraph("Dies ist ein spannender Abstaz, der eigentlich nicht wirklich etwas thematisiert. ");
        $p1->add(new Hyperlink(text: "MacBook ansehen", href: ["?controller=computer&action=show"]));

        $p1->addAttribute('class',['text-bold']);

        if($color = Request::GET->get('color') and $color == 'red')
        {
            $p1->addAttribute('class',['text-danger']);
        } else {
            $p1->addAttribute('class',['text-success']);
        }

        echo $h1->render();
        echo $p1->render();
    }

    public function show (): void
    {
        $h1 = new Headline("MacBook genauer betrachten");
        $h1->setHeadlineType(ComponentInterface::H1);
       
        $p1 = new Paragraph("Werfen wir einen Blick auf das MacBook! ");
        $p1->add(new Hyperlink(text: "Zur Übersicht",href: ["?controller=computer&action=index"]));

        echo $h1->render();
        echo $p1->render();
    }

    // TODO: Methode in Oberklasse implementieren, die das Grundgerüst rendert und die erzeugten Elemente entgegennimmt.

    // TODO: Methode für Hyerlink-Erstellungen entweder in Oberklasse oder in eine Enumeration auslagern.


}
