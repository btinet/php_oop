<?php

namespace App\Controller;

use App\View\Component\Headline;
use App\View\Component\HeadlineType;
use App\View\Component\Paragraph;
use App\View\TwitterBootstrap\Button;
use App\View\TwitterBootstrap\ButtonType;
use App\View\TwitterBootstrap\Container;

class NotFoundController extends AbstractController
{

    public function index (): string
    {

        $this->title->add("Seite nicht gefunden",'text');

        $container = new Container();

        $h1 = new Headline("Seite nicht gefunden!");
        $h1->setHeadlineType(HeadlineType::H1);

        $p = new Paragraph("Die gewünschte Seite existiert nicht oder nicht mehr.");
        $p->addStyle(["lead"]);

        $link = new Button("Zurück zur Startseite",$this->getResponse()->generateLink(),ButtonType::LIGHT);
        $link->addStyle(["btn-sm"]);

        $container
            ->add($h1)
            ->add($p)
            ->add($link)
        ;

        $this->root->add($container);

        return $this->render();

    }

}
