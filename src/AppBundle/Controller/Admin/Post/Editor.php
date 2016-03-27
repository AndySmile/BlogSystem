<?php
namespace AppBundle\Controller\Admin\Post;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Post;

/**
 * BlogSystem - Admin Editor Controller.
 *
 * @author      Andy Liebke <info@andysmiles4games.com>
 * @version     0.2.0 27-Mar-16
 * @copyright   Copyright (c) 2016 by Andy Liebke. All rights reserved. (http://andysmiles4games.com)
 */
class Editor extends Controller
{
    /**
     * Displays the empty blog post editor.
     *
     * This form creates a new blog post.
     * 
     * @param Request $request - HTTP request object
     *
     * @return Response - includes rendered HTML content from the twig template
     *
     * @Route("/admin/post/editor", name="admin_post_editor")
     */
    public function indexAction(Request $request)
    {
        return $this->showEditor(null);
    }
    
    /**
     * Displays editor form to alter a blog post entry.
     *
     * @param int $id - Blog post ID
     *
     * @return Response - includes rendered HTML content from the twig template
     *
     * @Route("/admin/post/editor/edit/{id}", name="admin_post_edit")
     */
    public function editAction($id)
    {
        return $this->showEditor($id);
    }
    
    /**
     * Displays editor form.
     *
     * Collects blog post data and renders the template to a HTML response object.
     *
     * @param int $id - Blog post ID
     *
     * @return Response - includes rendered HTML content from the twig template
     */
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
     * Saves blog post data into database.
     *
     * @param Request $request - HTTP request object
     *
     * @return Response - redirection response to the blog post overview page
     *
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