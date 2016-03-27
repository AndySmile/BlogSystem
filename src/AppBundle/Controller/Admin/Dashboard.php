<?php
namespace AppBundle\Controller\Admin;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @version     0.2.0 26-Mar-16
 * @copyright   Copyright (c) 2016 by Andy Liebke. All rights reserved. (http://andysmiles4games.com)
 */
class Dashboard extends Controller
{
    /**
     * @Route("/admin/", name="admin_dashboard")
     */
    public function indexAction(Request $request)
    {
        return $this->render('admin/dashboard.html.twig', []);
    }
}