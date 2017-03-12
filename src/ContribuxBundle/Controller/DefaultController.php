<?php

namespace ContribuxBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class DefaultController extends Controller
{


    /**
     * Page d'accueil
     * @Route("/", name="index")
     *
     */
    public function indexAction()
    {

        return $this->render('ContribuxBundle:Default:index.html.twig');
    }

    /**
     *
     * @Route("/mentions-legales", name="mentionsL")
     */
    public function mentionsLAction()
    {
        return $this->render('ContribuxBundle:Default:mentions-legales.html.twig');
    }

    /**
     *
     * @Route("/a-propos", name="about")
     */
    public function aProposAction()
    {
        return $this->render('ContribuxBundle:Default:a-propos.html.twig');
    }
}
