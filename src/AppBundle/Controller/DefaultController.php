<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * BlogSystem - Login as the default controller.
 *
 * @version 	0.1.1 27-Mar-16
 * @copyright   Copyright (c) 2016 by Andy Liebke. All rights reserved. (http://andysmiles4games.com)
 */
class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $auth = $this->get('security.authentication_utils');
        
        $listErrors = $auth->getLastAuthenticationError();
        
        /*var_dump($listErrors);*/
        
        return $this->render('page/login.html.twig', []);
    }
}
