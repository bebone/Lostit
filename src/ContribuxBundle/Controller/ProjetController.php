<?php

namespace ContribuxBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use JMS\SecurityExtraBundle\Annotation\Secure;
use ContribuxBundle\Entity\Projet;
use Symfony\Component\HttpFoundation\Request;
use ContribuxBundle\Form\Type\ProjetType;

class ProjetController extends Controller
{


    /**
     *
     * @Route("/projets/{page}", name="projets_list")
     *
     */
    public function projetsListAction($page)
    {
        $nbParPage =5; //TODO (10 en dur)
        $em = $this->getDoctrine()->getManager();
        $projets=$em->getRepository('ContribuxBundle:Projet')->getAllProjets($page,$nbParPage);


        $pagination = array(
            'page' => $page,
            'nbPages' => ceil(count($projets) / $nbParPage),
            'nomRoute' => 'projets_list',
            'paramsRoute' => array()
        );



        return $this->render('ContribuxBundle:Projet:projetsList.html.twig', array('projets'=>$projets, 'pagination'=>$pagination));
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
