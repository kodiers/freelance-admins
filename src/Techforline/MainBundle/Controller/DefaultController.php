<?php

namespace Techforline\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="index")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $orders = $em->getRepository('TechforlineMainBundle:Orders')->findBy(array(), array('updatedAt' => 'DESC'));
        return $this->render('TechforlineMainBundle:Default:index.html.twig', array('orders' => $orders));
    }
}
