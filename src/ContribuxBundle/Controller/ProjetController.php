<?php

namespace ContribuxBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use JMS\SecurityExtraBundle\Annotation\Secure;
use ContribuxBundle\Entity\Projet;
use ContribuxBundle\Entity\Categorie;
use Symfony\Component\HttpFoundation\Request;
use ContribuxBundle\Form\Type\ProjetType;

class ProjetController extends Controller
{


    /**
     *
     * @Route("/projets", name="projets_list")
     *
     */
    public function projetsListAction()
    {
        $em = $this->getDoctrine()->getManager();
        $langages=$em->getRepository('ContribuxBundle:Langage')->findAll();
        $categories=$em->getRepository('ContribuxBundle:Categorie')->findAll();
        return $this->render('ContribuxBundle:Projet:projetsList.html.twig',array('categories'=>$categories));
    }

    /**
     *
     * @Route("/projets_ajax/{page}", name="projets_ajax")
     *
     */
    public function projetsAjaxAction($page) {

        $nbParPage =2; //TODO (10 en dur)
        $em = $this->getDoctrine()->getManager();
        $projets=$em->getRepository('ContribuxBundle:Projet')->getAllProjets($page,$nbParPage);


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
     * @Route("/mesprojets/{page}", name="mes_projets")
     * @Secure(roles="ROLE_USER")
     *
     */
    public function mesProjetsListAction($page)
    {
        $nbParPage =2; //TODO (10 en dur)
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser(); //On récupère l'utilisateur
        $projets=$em->getRepository('ContribuxBundle:Projet')->getMyProjets($page,$nbParPage, $user);


        $pagination = array(
            'page' => $page,
            'nbPages' => ceil(count($projets) / $nbParPage),
            'nomRoute' => 'mes_projets',
            'paramsRoute' => array()
        );

        return $this->render('ContribuxBundle:Projet:MesProjetsList.html.twig', array('projets'=>$projets, 'pagination'=>$pagination));
    }



    /**
     *
     * @Route("/projet/create", name="projet_create")
     * @Secure(roles="ROLE_USER")
     *
     */
    public function projetCreateAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $projet = new Projet();
        $user = $this->getUser(); //On récupère l'utilisateur
        $form = $this->createForm(ProjetType::class, $projet);
        $form->handleRequest($request);
        if ($form->isValid()) {
            if ($form["file"]->getData() != null) {
                $projet->uploadProjetPicture();
            }
            $projet->setUser($user);
            $em->persist($projet);
            $em->flush();
            $this->get('session')->getFlashBag()->add('info', "Le projet a bien été ajouté");
            return $this->redirect($this->generateUrl('projet_view'));
        }

        return $this->render('ContribuxBundle:Projet:projetCreate.html.twig', array(
            'entity' => $projet,
            'form' => $form->createView()
        ));

    }


    /**
     *
     * @Route("/projet/{id}", name="projet_view")
     *
     */
    public function projetViewAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $projet=$em->getRepository('ContribuxBundle:Projet')->find($id);
        return $this->render('ContribuxBundle:Projet:projet.html.twig', array('projet'=>$projet));
    }








}
