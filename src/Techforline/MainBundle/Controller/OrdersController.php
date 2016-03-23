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
use Techforline\MainBundle\Entity\Comments;
use Techforline\MainBundle\Form\Type\OrdersType;
use Techforline\MainBundle\Form\Type\CommentsType;
use Techforline\MainBundle\Entity\Orders;

class OrdersController extends Controller
{
    /**
     * @Route("/orders/add", name="add_order")
     * @Method({"GET", "POST"})
     */
    public function addorderAction(Request $request)
    {
        $order = new Orders();
        $order->setCustomer($this->getUser());
        $form = $this->createForm(OrdersType::class, $order, array('method' => 'POST'));
        $form->handleRequest($request);
        if($form->isValid() && $form->isSubmitted())
        {
//            $order->setCustomer($this->getUser());
            $em = $this->getDoctrine()->getManager();
            $em->persist($order);
            $em->flush();
        }
        return $this->render("@TechforlineMain/Default/addorder.html.twig", array('form' => $form->createView()));
    }

    /**
     * @Route("/orders/{id}", name="order_detail")
     */
    public function orderdetailsAction($id)
    {
        $order_repository = $this->getDoctrine()->getRepository('TechforlineMainBundle:Orders');
        $comments_repository = $this->getDoctrine()->getRepository('TechforlineMainBundle:Comments');
        $order = $order_repository->find($id);
        $comments = $comments_repository->findByOrder($order);
        $comment = new Comments();
        $comment->setUser($this->getUser());
        $form = $this->createForm(CommentsType::class, $comment, array('method' => 'POST'));
        return $this->render("TechforlineMainBundle:Default:orderdetails.html.twig", array(
            "order" => $order,
            "comments" => $comments,
            "form" => $form->createView(),
        ));
    }
}