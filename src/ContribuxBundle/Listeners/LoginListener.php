<?php

namespace ContribuxBundle\Listeners;

use FOS\UserBundle\Model\UserManagerInterface;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;

class LoginListener {

    protected $userManager;


    public function __construct(UserManagerInterface $userManager) {

        $this->userManager = $userManager;
    }

    public function onSecurityInteractiveLogin(InteractiveLoginEvent $event)
    {
        $event->getRequest()->getSession()->getFlashBag()->add('info', "Tu es charmante !!");
    }
}