<?php

namespace ContribuxBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ProjetType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('titre')
            ->add('description')
            ->add('site')
            ->add('categorie', EntityType::class, array('class' => 'ContribuxBundle:Categorie', 'choice_label' => 'nom', 'label'=>'Catégorie'))
            ->add('langage', EntityType::class, array('class' => 'ContribuxBundle:Langage', 'choice_label' => 'nom', 'label'=>'Langage'))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'ContribuxBundle\Entity\Projet'
        ));
    }


    public function getBlockPrefix()
    {
        return 'projet_create';
    }


}