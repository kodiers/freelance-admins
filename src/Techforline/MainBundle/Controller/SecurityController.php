<?php
/**
 * Created by PhpStorm.
 * User: kodiers
 * Date: 22/02/16
 * Time: 05:22
 */
namespace Techforline\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class SecurityController extends Controller
{
    /**
     * @Route("/login", name="login")
     */
    public function loginAction(Request $request)
    {
        $authenticationUtils = $this->get('security.authentication_utils');
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();
        return $this->render('@TechforlineMain/Default/login.html.twig', array(
            'last_username' => $lastUsername,
            'error' => $error
        ));
    }
}