<?php
namespace ContribuxBundle\Handler;

use Symfony\Component\Security\Http\Logout\LogoutSuccessHandlerInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\Session;

class LogoutHandler implements LogoutSuccessHandlerInterface
{
    //protected $router;
    protected $session;

    public function __construct(Session $session)
    {
        //$this->router = $router;
        $this->session = $session;
    }

    public function onLogoutSuccess(Request $request)
    {
         $this->session->getFlashBag()->add('success', 'OUIOUIOUIOUI');
        return new RedirectResponse('/');

    }

}
