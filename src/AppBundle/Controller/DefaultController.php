<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * BlogSystem - Login page as the default controller.
 *
 * @author      Andy Liebke <info@andysmiles4games.com>
 * @version 	0.1.2 28-Mar-16
 * @copyright   Copyright (c) 2016 by Andy Liebke. All rights reserved. (http://andysmiles4games.com)
 */
class DefaultController extends Controller
{
    /**
     * Displays the login page.
     *
     * In case that the user is already signed in, 
     * the user will be redirected to the admin dashboard.
     *
     * @param Request $request - HTTP request object
     *
     * @return Response - in case the user is already signed in it will return a redirection response
     *                    otherwise a rendered login HTML page
     *
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $auth = $this->get('security.authentication_utils');
        $security = $this->get('security.authorization_checker');
        
        if ($security->isGranted('IS_AUTHENTICATED_FULLY')){
            return $this->redirectToRoute('admin_dashboard');
        } else {
            return $this->render('page/login.html.twig', []);
        }
    }
}
