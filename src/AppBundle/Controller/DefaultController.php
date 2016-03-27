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
        return $this->render('page/login.html.twig', [
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir') . '/..')
        ]);
    }
}
