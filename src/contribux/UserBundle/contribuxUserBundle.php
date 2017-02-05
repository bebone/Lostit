<?php

namespace contribux\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class contribuxUserBundle extends Bundle
{
    public function getParent()

    {
        return 'FOSUserBundle';
    }
}
