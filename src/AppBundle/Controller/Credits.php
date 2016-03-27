<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @version     0.1.0 27-Mar-16
 * @copyright   Copyright (c) 2016 by Andy Liebke. All rights reserved. (http://andysmiles4games.com)
 */
class Credits extends Controller
{
    /**
     * @Route("/credits", name="credits")
     */
    public function indexAction()
    {
        return $this->render('page/credits.html.twig', []);
    }
}