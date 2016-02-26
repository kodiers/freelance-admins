<?php

namespace Techforline\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class TechforlineUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
