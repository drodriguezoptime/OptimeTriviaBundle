<?php

namespace Optime\TriviaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@OptimeTrivia/Default/index.html.twig');
    }
}
