<?php

namespace ContribuxBundle\Controller;

use ContribuxBundle\Entity\Categorie;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class RechercheController extends Controller
{

    /**
     * Affichage de la page RECHERCHER
     * @Route("/rechercher", name="rechercher")
     *
     */
    public function rechercheAction()
    {
        $em = $this->getDoctrine()->getManager();
        // récupération de l'ensemble des langages
        $langages=$em->getRepository('ContribuxBundle:Langage')->findAll();
        return $this->render('ContribuxBundle:Recherche:rechercher.html.twig',array('langages'=>$langages));
    }

    /**
     * Envoi des données HTML
     * @Route("/recherche_categorie_ajax/{id}/{page}", name="recherche_categorie_ajax")
     *
     */
    public function rechercheCategorieAjaxAction($id, $page) {

        $nbParPage =4; //TODO écrire le paramètre ailleurs
        $em = $this->getDoctrine()->getManager();
        // Requete de recherche selon la catégorie (son id)
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

        $nbParPage =4; 
        $em = $this->getDoctrine()->getManager();
        // Requete de recherche selon le type d'aide (booleen)
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

        $nbParPage =4; 
        $em = $this->getDoctrine()->getManager();
         // Requete de recherche selon le nom du projet
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
         // Requete de recherche selon le langage
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