<?php

namespace App\View\Page\Computer;

use App\Controller\ComputerController;
use App\Model\Request;
use App\Model\Response;
use App\View\Component\AbstractComponent;
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
use JetBrains\PhpStorm\Pure;

class ComputerIndex
{

    public const ColorMandatory = "color";

    private Response $response;

    #[Pure] public function __construct()
    {
        $this->response = new Response();
    }

    public function render (): AbstractComponent
    {
        $h1 = new Headline("Übersicht der Computer");
        $h1->setHeadlineType(HeadlineType::H1);

        $p1 = new Paragraph("Dies ist ein spannender Absatz, der eigentlich nicht wirklich etwas thematisiert. ");
        $p1->add(new Hyperlink("MacBook ansehen", $this->response->generateUrlFromString(ComputerController::class,"show")));

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
            ->addListItem(new Hyperlink("Linktext",$this->response->generateUrlFromString(ComputerController::class,"index",[self::ColorMandatory => Color::INFO])))
        ;



        $container = new Container();

        $container
            ->add($h1)
            ->add($p1)
            ->add($listGroupBuilder->createListGroup())
            ->add(
                new Button(
                    'roter Text',
                    $this->response->generateUrlFromString(ComputerController::class,"index",[self::ColorMandatory => Color::DANGER]),
                    ButtonType::DANGER)
            )
            ->add(
                new Button(
                    'grüner Text',
                    $this->response->generateUrlFromString(ComputerController::class,"index",[self::ColorMandatory => Color::SUCCESS]),
                    ButtonType::SUCCESS)
            )
        ;

        return $container;
    }

}
