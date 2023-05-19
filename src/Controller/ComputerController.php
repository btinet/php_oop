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
        $p1->add(new Hyperlink("MacBook ansehen", $this->url(ComputerController::class,"show")));

        $p1->addAttribute('class',['text-bold']);

        if($color = Request::GET->get('color') and $color == 'red')
        {
            $p1->addAttribute('class',['text-danger']);
        } else {
            $p1->addAttribute('class',['text-success']);
        }

        $this->title->add("&Uuml;bersicht",'text');

        $this->root->add($h1);
        $this->root->add($p1);

        $this->render();
    }

    public function show (): void
    {
        $h1 = new Headline("MacBook genauer betrachten");
        $h1->setHeadlineType(ComponentInterface::H1);
       
        $p1 = new Paragraph("Werfen wir einen Blick auf das MacBook! ");

        // Methode zum Generieren von Hyperlinks
        $link = $this->url(
            class: ComputerController::class,
            method: "index"
            );

        $p1->add(new Hyperlink("Zur Übersicht",$link));

        $this->root->add($h1);
        $this->root->add($p1);

        $this->render();
    }

}
