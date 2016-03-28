<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * BlogSystem - Credits Controller.
 *
 * @author      Andy Liebke <info@andysmiles4games.com>
 * @version     0.1.0 27-Mar-16
 * @copyright   Copyright (c) 2016 by Andy Liebke. All rights reserved. (http://andysmiles4games.com)
 */
class Credits extends Controller
{
    /**
     * Displays the credits page.
     *
     * @return Response - rendered HTML credits page
     *
     * @Route("/credits", name="credits")
     */
    public function indexAction()
    {
        return $this->render('page/credits.html.twig', []);
    }
}