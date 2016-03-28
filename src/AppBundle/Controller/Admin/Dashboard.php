<?php
namespace AppBundle\Controller\Admin;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * BlogSystem - Admin dashboard controller.
 *
 * @author      Andy Liebke <info@andysmiles4games.com>
 * @version     0.2.0 26-Mar-16
 * @copyright   Copyright (c) 2016 by Andy Liebke. All rights reserved. (http://andysmiles4games.com)
 */
class Dashboard extends Controller
{
    /**
     * Displays the admin dashboard.
     *
     * @return Response - rendered HTML admin dashboard
     *
     * @Route("/admin/", name="admin_dashboard")
     */
    public function indexAction()
    {
        return $this->render('admin/dashboard.html.twig', []);
    }
}