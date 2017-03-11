<?php

namespace ContribuxBundle\Controller;

use ContribuxBundle\Entity\Categorie;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use JMS\SecurityExtraBundle\Annotation\Secure;
use ContribuxBundle\Entity\Projet;
use Symfony\Component\HttpFoundation\Request;
use ContribuxBundle\Form\Type\ProjetType;

class RechercheController extends Controller
{

    /**
     *
     * @Route("/rechercher", name="rechercher")
     *
     */
    public function rechercheAction()
    {
        $em = $this->getDoctrine()->getManager();
        $langages=$em->getRepository('ContribuxBundle:Langage')->findAll();
        return $this->render('ContribuxBundle:Recherche:rechercher.html.twig',array('langages'=>$langages));
    }

    /**
     *
     * @Route("/recherche_categorie_ajax/{id}/{page}", name="recherche_categorie_ajax")
     *
     */
    public function rechercheCategorieAjaxAction($id, $page) {

        $nbParPage =2; //TODO (10 en dur)
        $em = $this->getDoctrine()->getManager();
        $projets=$em->getRepository('ContribuxBundle:Projet')->getCategorieProjets($id, $page,$nbParPage);


        $pagination = array(
            'page' => $page,
            'nbPages' => ceil(count($projets) / $nbParPage),
            'nomRoute' => 'projets_ajax',
            'paramsRoute' => array()
        );

        return $this->render('ContribuxBundle:Projet:projetsListAjax.html.twig', array('projets'=>$projets, 'pagination'=>$pagination));

    }

    /**
     *
     * @Route("/recherche_aide_ajax/{type}/{page}", name="recherche_aide_ajax")
     *
     */
    public function rechercheAideAjaxAction($type, $page) {

        $nbParPage =2; //TODO (10 en dur)
        $em = $this->getDoctrine()->getManager();
        $projets=$em->getRepository('ContribuxBundle:Projet')->getAideProjets($type, $page,$nbParPage);


        $pagination = array(
            'page' => $page,
            'nbPages' => ceil(count($projets) / $nbParPage),
            'nomRoute' => 'projets_ajax',
            'paramsRoute' => array()
        );

        return $this->render('ContribuxBundle:Projet:projetsListAjax.html.twig', array('projets'=>$projets, 'pagination'=>$pagination));

    }


    /**
     *
     * @Route("/recherche_nom_ajax/{nom}/{page}", name="recherche_nom_ajax")
     *
     */
    public function rechercheNomAjaxAction($nom, $page) {

        $nbParPage =2; //TODO (10 en dur)
        $em = $this->getDoctrine()->getManager();
        $projets=$em->getRepository('ContribuxBundle:Projet')->getNomProjets($nom, $page,$nbParPage);


        $pagination = array(
            'page' => $page,
            'nbPages' => ceil(count($projets) / $nbParPage),
            'nomRoute' => 'projets_ajax',
            'paramsRoute' => array()
        );

        return $this->render('ContribuxBundle:Projet:projetsListAjax.html.twig', array('projets'=>$projets, 'pagination'=>$pagination));

    }


    /**
     *
     * @Route("/recherche_langage_ajax/{id}/{page}", name="recherche_langage_ajax")
     *
     */
    public function rechercheLangageAjaxAction($id, $page) {

        $nbParPage =4; //indication dans le controller
        $em = $this->getDoctrine()->getManager();
        //Appel à la requete dans le repository
        $projets=$em->getRepository('ContribuxBundle:Projet')->getLangageProjets($id, $page,$nbParPage);


        $pagination = array(
            'page' => $page,
            'nbPages' => ceil(count($projets) / $nbParPage),
            'nomRoute' => 'projets_ajax',
            'paramsRoute' => array()
        );

        return $this->render('ContribuxBundle:Projet:projetsListAjax.html.twig', array('projets'=>$projets, 'pagination'=>$pagination));

    }

}