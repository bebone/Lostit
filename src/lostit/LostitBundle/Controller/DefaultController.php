<?php

namespace lostit\LostitBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('lostitLostitBundle:Default:index.html.twig');
    }
    
    public function mentionsLAction()
    {
        return $this->render('lostitLostitBundle:Default:mentions-legales.html.twig');
    }
    
    public function quisommesNousAction()
    {
        return $this->render('lostitLostitBundle:Default:qui-sommes-nous.html.twig');
    }
}
