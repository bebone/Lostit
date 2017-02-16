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
     * @Route("/projet/{id}", name="projet_edit")
     * @Secure(roles="ROLE_USER")
     *
     */
    public function projetEditAction($id)
    {
        return $this->render('ContribuxBundle:Projet:projetEdit.html.twig');
    }


}
