<?php

namespace App\Controller;

use App\Entity\Laptop;
use App\Model\Request;
use App\View\Component\Headline;
use App\View\Component\HeadlineType;
use App\View\Component\Hyperlink;
use App\View\Component\Paragraph;
use App\View\Component\Segment;
use App\View\TwitterBootstrap\Button;
use App\View\TwitterBootstrap\ButtonType;
use App\View\TwitterBootstrap\Color;
use App\View\TwitterBootstrap\ComponentBuilder\ListGroupComponentBuilder;
use App\View\TwitterBootstrap\Container;
use App\View\TwitterBootstrap\FontWeight;
use App\View\TwitterBootstrap\TextType;

class ComputerController extends AbstractController
{

    public const ColorMandatory = "color";

    public function index (): string
    {
        // TODO: extract view elements to own view classes

        $h1 = new Headline("Übersicht der Computer");
        $h1->setHeadlineType(HeadlineType::H1);
       
        $p1 = new Paragraph("Dies ist ein spannender Absatz, der eigentlich nicht wirklich etwas thematisiert. ");
        $p1->add(new Hyperlink("MacBook ansehen", $this->url(ComputerController::class,"show")));

        $p1->addAttribute('class',[FontWeight::BOLD]);

        if($color = Request::GET->get(self::ColorMandatory) and $color == Color::DANGER)
        {
            $p1->addAttribute('class',[TextType::DANGER]);
        } else if($color = Request::GET->get(self::ColorMandatory) and $color == Color::SUCCESS) {
            $p1->addAttribute('class',[TextType::SUCCESS]);
        } else if($color = Request::GET->get(self::ColorMandatory) and $color == Color::INFO) {
            $p1->addAttribute('class',[TextType::INFO]);
        }

        $listGroupBuilder = new ListGroupComponentBuilder();
        $listGroupBuilder
            ->addListItem(new Segment("Dies ist ein Menüpunkt"))
            ->addListItem(new Segment("Dies ist noch ein Menüpunkt"))
            ->addListItem(new Hyperlink("Linktext",$this->url(ComputerController::class,"index",[self::ColorMandatory => Color::INFO])))
        ;

        $this->title->add("&Uuml;bersicht",'text');

        $container = new Container();

        $container
            ->add($h1)
            ->add($p1)
            ->add($listGroupBuilder->createListGroup())
            ->add(
                new Button(
                    'roter Text',
                    $this->url(ComputerController::class,"index",[self::ColorMandatory => Color::DANGER]),
                    ButtonType::DANGER)
                )
            ->add(
                new Button(
                    'grüner Text',
                    $this->url(ComputerController::class,"index",[self::ColorMandatory => Color::SUCCESS]),
                    ButtonType::SUCCESS)
                )
        ;

        $this->root->add($container);

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
        $container->add($h1);
        $container->add($p1);

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
