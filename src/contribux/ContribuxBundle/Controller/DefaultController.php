<?php

namespace contribux\ContribuxBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('contribuxContribuxBundle:Default:index.html.twig');
    }
    
    public function mentionsLAction()
    {
        return $this->render('contribuxContribuxBundle:Default:mentions-legales.html.twig');
    }
    
    public function quisommesNousAction()
    {
        return $this->render('contribuxContribuxBundle:Default:qui-sommes-nous.html.twig');
    }
}
