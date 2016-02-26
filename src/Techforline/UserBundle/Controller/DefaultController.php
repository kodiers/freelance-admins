<?php

namespace Techforline\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/users")
     */
    public function indexAction()
    {
        return $this->render('TechforlineUserBundle:Default:index.html.twig');
    }
}
