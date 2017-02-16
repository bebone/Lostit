<?php

namespace UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //parent::buildForm($builder, $options);
        /*$builder
            ->add('nom', null, array('attr' => array('class' => 'inputText')))
            ->add('prenom', null, array('attr' => array('class' => 'inputText')))
            ->add('statut', ChoiceType::class, array(
                'choices'  => array(
                    'Étudiant' => "Étudiant(e)",
                    'Salarié' => "Salarié(e)",
                    "En recherche d'emploi" => "En recherche d'emploi",
                    'Autre' => "Autre",
                )))
            ->add('dateNaissance', BirthdayType::class, array('attr' => array('class' => 'inputText')));*/

    }


    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }
}