<?php
/**
 * Created by PhpStorm.
 * User: kodiers
 * Date: 14/03/16
 * Time: 03:22
 */
namespace Techforline\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Techforline\MainBundle\Form\Type\PayFormsType;
use Techforline\MainBundle\Entity\PayForms;

class PayFormsController extends Controller
{
    /**
     * @Route("/addpayform", name="add_payform")
     * @Method({"GET", "POST"})
     */
    public function addorderAction(Request $request)
    {
        $payform = new PayForms();
        $form = $this->createForm(PayFormsType::class, $payform, array('method' => 'POST'));
        $form->handleRequest($request);
        if($form->isValid() && $form->isSubmitted())
        {
//            $payform->setCustomer($this->getUser());
            $em = $this->getDoctrine()->getManager();
            $em->persist($payform);
            $em->flush();
        }
        return $this->render("@TechforlineMain/Default/addpayform.html.twig", array('form' => $form->createView()));
    }
}