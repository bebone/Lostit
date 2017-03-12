<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use JMS\SecurityExtraBundle\Annotation\Secure;
use ContribuxBundle\Entity\Projet;
use ContribuxBundle\Entity\Categorie;
use Symfony\Component\HttpFoundation\Request;
use ContribuxBundle\Form\Type\ProjetType;
use UserBundle\Entity\User;

class DefaultController extends Controller
{


    /**
     *
     * @Route("/profile/{username}", name="user_profil")
     */
    public function userProfil($username) //Affiche le profil d'un utilisateur
    {
        $em=$this->getDoctrine()->getManager();
        $user=$em->getRepository("UserBundle:User")->findOneBy(array('username'=>$username));
        $projets=$user->getProjets();
        return $this->render('UserBundle:Default:profil.html.twig', array('user'=>$user, 'projets'=>$projets));
    }
}
