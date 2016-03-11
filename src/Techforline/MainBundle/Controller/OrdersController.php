<?php
/**
 * Created by PhpStorm.
 * User: kodiers
 * Date: 03/03/16
 * Time: 04:14
 */
namespace Techforline\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Techforline\MainBundle\Form\Type\OrdersType;
use Techforline\MainBundle\Entity\Orders;

class OrdersController extends Controller
{
    /**
     * @Route("/addorder", name="add_order")
     * @Method({"GET", "POST"})
     */
    public function addorderAction(Request $request)
    {
        $order = new Orders();
        $form = $this->createForm(OrdersType::class, $order, array('method' => 'POST'));
        $form->handleRequest($request);
        if($form->isValid() && $form->isSubmitted())
        {
            $order->setCustomer($this->getUser());
            $em = $this->getDoctrine()->getManager();
            $em->persist($order);
            $em->flush();
        }
        return $this->render("@TechforlineMain/Default/addorder.html.twig", array('form' => $form->createView()));
    }
}