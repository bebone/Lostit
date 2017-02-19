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
            ->add('titre',null,array('attr'=>array('class'=>"form-control")))
            ->add('description',null,array('attr'=>array('class'=>"form-control",'name'=>'ckeditor')))
            ->add('file',null,array('attr'=>array('class'=>"form-control"),'label'=>'Image'))
            ->add('site',null,array('attr'=>array('class'=>"form-control"), 'label'=>'Site web du projet'))
            ->add('categorie', EntityType::class, array('class' => 'ContribuxBundle:Categorie', 'choice_label' => 'nom', 'label'=>'Catégorie','attr'=>array('class'=>"form-control"), 'placeholder' => 'Choisir...'))
            ->add('langage', EntityType::class, array('class' => 'ContribuxBundle:Langage', 'choice_label' => 'nom', 'label'=>'Langage','attr'=>array('class'=>"form-control"), 'placeholder' => 'Choisir...'))
            ->add('developpement',null,array('attr'=>array('class'=>"form-control"), 'label'=>'Aide pour le développement?'))
            ->add('traduction',null,array('attr'=>array('class'=>"form-control"), 'label'=>'Aide pour la traduction?'))
            ->add('documentation',null,array('attr'=>array('class'=>"form-control"), 'label'=>'Aide pour la documentation?'))
            ->add('graphisme',null,array('attr'=>array('class'=>"form-control"), 'label'=>'Aide pour le graphisme?'))
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