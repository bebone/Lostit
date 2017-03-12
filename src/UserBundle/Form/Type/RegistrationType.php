<?php

namespace UserBundle\Form\Type;

use FOS\UserBundle\Util\LegacyFormHelper;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

/* Voir le formulaire parent : https://github.com/FriendsOfSymfony/FOSUserBundle/blob/master/Form/Type/RegistrationFormType.php */

class RegistrationType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        //parent::buildForm($builder, $options);
        $builder
                ->add('email', LegacyFormHelper::getType('Symfony\Component\Form\Extension\Core\Type\EmailType'), array('label' => 'form.email', 'translation_domain' => 'FOSUserBundle','attr'=>array('class'=>'form-control')))
                ->add('username', null, array('label' => 'form.username', 'translation_domain' => 'FOSUserBundle', 'attr'=>array('class'=>'form-control')))
                ->add('plainPassword', LegacyFormHelper::getType('Symfony\Component\Form\Extension\Core\Type\RepeatedType'), array(
                    'type' => LegacyFormHelper::getType('Symfony\Component\Form\Extension\Core\Type\PasswordType'),
                    'options' => array('translation_domain' => 'FOSUserBundle'),
                    'first_options' => array('label' => 'form.password','attr'=>array('class'=>'form-control')),
                    'second_options' => array('label' => 'form.password_confirmation','attr'=>array('class'=>'form-control')),
                    'invalid_message' => 'fos_user.password.mismatch',
                ))
                ->add('bio', null, array('attr' => array('class' => 'form-control')))
                ->add('site', null, array('attr' => array('class' => 'form-control')))
                ->add('ircUsername', null, array('attr' => array('class' => 'form-control')))
                ->add('ircNetwork', null, array('attr' => array('class' => 'form-control')));
    }

    public function getParent() {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }

    public function getBlockPrefix() {
        return 'app_user_registration';
    }

}
