<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

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
        return $this->render('page/setup.html.twig', []);
    }
    
    /**
     * @Route("/setup/install", name="setup_install")
     */
    public function installAction(Request $request)
    {
        try {
            $entityManager = $this->getDoctrine()->getManager();
        
            $sql = 'CREATE TABLE IF NOT EXISTS `posts` (
                        `id`            int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
                        `status`        tinyint(1) NOT NULL,
                        `email`         varchar(100) NOT NULL,
                        `title`         varchar(255) NOT NULL,
                        `content`       text NOT NULL,
                        `updated_at`    timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                        PRIMARY KEY (`id`)
                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8';
            
            $entityManager->getConnection()->exec($sql);
            
            $sql = 'CREATE TABLE IF NOT EXISTS `user` (
                        `id`            int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
                        `is_active`     tinyint(1) NOT NULL,
                        `nickname`      varchar(100) NOT NULL,
                        `email`         varchar(100) NOT NULL,
                        `password` 	    varchar(1000) NOT NULL,
                        PRIMARY KEY (`id`),
                        UNIQUE KEY `email_index` (`email`)
                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8';
            
            $entityManager->getConnection()->exec($sql);
            
            $this->addFlash('success', 'Database is ready!');
        } catch (Exception $e) {
            $this->addFlash('error', $e->getMessage());
        }
        
        
        return $this->redirectToRoute('setup');
    }
}