<?php

namespace lostit\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class lostitUserBundle extends Bundle
{
    public function getParent()

    {
        return 'FOSUserBundle';
    }
}
