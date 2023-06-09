<?php

namespace App\Controller;


use App\View\Component\ComponentInterface;
use App\View\Component\Link;
use App\View\Component\Root;
use App\View\Component\Head;
use App\View\Component\HTML;
use App\View\Component\Meta;
use App\View\Component\Script;
use App\View\Component\Title;
use App\Model\Response;

abstract class AbstractController
{

    protected Root $root;
    protected Title $title;
    protected Head $head;
    private HTML $html;
    private Response $response;

    public function __construct()
    {
        $this->response = new Response();

        $this->html = new HTML();
        $this->root = new Root();
        $this->head = new Head();
        $this->title = new Title('Website-Titel');

        $this->html->add($this->head);
        $this->html->add($this->root);

        $this->head->add(new Meta('charset','UTF-8'));
        $this->head->add(new Meta('viewport','width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no'));
        $this->head->add($this->title);
        $this->head->add(new Link('stylesheet',$this->getResponse()->generateLink('/assets/bootstrap/dist/css/bootstrap.min.css')));
    
    }

    protected function getResponse(): Response
    {
        return $this->response;
    }

    /**
     * Diese Methode ist eine Abkürzung zur Response-Klasse, um eine Url zu generieren.
     * @param string $class Klasse, auf die Verlinkt werden soll.
     * @param string $method Die Methode der Klasse.
     * @param array|null $mandatory Zusätzliche Parameter, die übergeben werden sollen als Array [Name => Parameter].
     * @param null $anchor Anker auf Zielseite.
     * @return string Gibt den kompletten Link inklusive Protokoll und Hostnamen zurück.
     */
    protected function url(string $class, string $method, array $mandatory = null,$anchor = null): string
    {
        return $this->getResponse()->generateUrlFromString(class: $class, method: $method, mandatory: $mandatory, anchor: $anchor);
    }

    protected function render(): string
    {
        $this->root->add(new Script($this->getResponse()->generateLink('/assets/bootstrap/dist/js/bootstrap.bundle.min.js')));
        return $this->html->render();
    }

}