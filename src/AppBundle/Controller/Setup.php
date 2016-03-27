<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @author      Andy Liebke <info@andysmiles4games.com>
 * @version     0.2.0 26-Mar-16
 * @copyright   Copyright (c) 2016 by Andy Liebke. All rights reserved. (http://andysmiles4games.com)
 */
final class Setup extends Controller
{
    /**
     * Performs install routines.
     *
     * @param $request Request - request object
     *
     * @Route("/setup", name="setup")
     */
    public function indexAction(Request $request)
    {
        
        // nothing to show here, so return an empty response object
        return new Response();
    }
}