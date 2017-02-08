<?php

namespace contribux\ContribuxBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{

    /**
     *
     * @Route("/", name="index")
     */
    public function indexAction()
    {
        return $this->render('contribuxContribuxBundle:Default:index.html.twig');
    }

    /**
     *
     * @Route("/mentions-legales", name="mentionsL")
     */
    public function mentionsLAction()
    {
        return $this->render('contribuxContribuxBundle:Default:mentions-legales.html.twig');
    }

    /**
     *
     * @Route("/qui-sommes-nous", name="about")
     */
    public function quisommesNousAction()
    {
        return $this->render('contribuxContribuxBundle:Default:qui-sommes-nous.html.twig');
    }
}
