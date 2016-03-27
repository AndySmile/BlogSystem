<?php
namespace AppBundle\Controller\Admin\Post;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Post;

/**
 * @author      Andy Liebke <info@andysmiles4games.com>
 * @version     0.2.0 27-Mar-16
 * @copyright   Copyright (c) 2016 by Andy Liebke. All rights reserved. (http://andysmiles4games.com)
 */
class Editor extends Controller
{
    /**
     * @Route("/admin/post/editor", name="admin_post_editor")
     */
    public function indexAction(Request $request)
    {
        return $this->showEditor(null);
    }
    
    /**
     * @Route("/admin/post/editor/edit/{id}", name="admin_post_edit")
     */
    public function editAction($id)
    {
        return $this->showEditor($id);
    }
    
    private function showEditor($id)
    {
        try {
            $entityManager  = $this->getDoctrine()->getManager();
            $post           = (empty($id)) ? new Post() : $entityManager->getRepository('AppBundle:Post')->find($id);
        } catch (Exception $e) {
            $this->addFlash('error', $e->getMessage());
        }
        
        return $this->render('admin/post/editor.html.twig', [
            'post' => $post
        ]);
    }
    
    /**
     * @Route("/admin/post/editor/save", name="admin_post_editor_save")
     */
    public function saveAction(Request $request)
    {
        try {
            $id              = $request->request->get('id');
            $entityManager   = $this->getDoctrine()->getManager();
            $post 	         = (empty($id)) ? new Post() : $entityManager->getRepository('AppBundle:Post')->find($id);
            
            $post->setStatus($request->request->get('status'));
            $post->setTitle($request->request->get('title'));
            $post->setContent($request->request->get('content'));
            
            $entityManager->persist($post);
            $entityManager->flush();
        } catch (Exception $e) {
            $this->addFlash('error', $e->getMessage());
        }
        
        return $this->redirectToRoute('admin_post_overview');
    }
}