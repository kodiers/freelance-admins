<?php

namespace Techforline\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

use Techforline\MainBundle\Form\UserType;
use Techforline\MainBundle\Entity\User;

class UserController extends Controller
{
    /**
     * @Route("/register", name="user_registration")
     */
    public function registerAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            // Encrypt password
            $password = $this->get('security.password_encoder')->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);

            // save user to database
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            //TODO: create email notification

            return $this->redirect('/');
        }
        return $this->render('TechforlineMainBundle:Default:register.html.twig', array('form' => $form->createView()));
    }
}
