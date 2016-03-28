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
 * @version     0.2.1 28-Mar-16
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
        return $this->showEditor(null, $request->getSession());
    }
    
    /**
     * Displays editor form to alter a blog post entry.
     *
     * @param int $id           - Blog post ID
     * @param Request $request  - HTTP request object
     *
     * @return Response - includes rendered HTML content from the twig template
     *
     * @Route("/admin/post/editor/edit/{id}", name="admin_post_edit")
     */
    public function editAction($id, Request $request)
    {
        return $this->showEditor($id, $request->getSession());
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
    private function showEditor($id, $session)
    {
        try {
            $entityManager  = $this->getDoctrine()->getManager();
            $post           = (empty($id)) ? new Post() : $entityManager->getRepository('AppBundle:Post')->find($id);
            
            $previousData = $session->get('editor_data');
            
            if (is_array($previousData) && sizeof($previousData) > 0) {
                $post->setTitle($previousData['title']);
                $post->setEmail($previousData['email']);
                $post->setStatus($previousData['status']);
                $post->setContent($previousData['content']);
                
                $session->remove('editor_data');
            }
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
        $success = false;
        $id      = $request->request->get('id');
        
        try {
            $validator       = $this->get('validator');
            $entityManager   = $this->getDoctrine()->getManager();
            $post 	         = (empty($id)) ? new Post() : $entityManager->getRepository('AppBundle:Post')->find($id);
            
            $post->setStatus($request->request->get('status'));
            $post->setTitle($request->request->get('title'));
            $post->setContent($request->request->get('content'));
            $post->setEmail($request->request->get('email'));
            
            $listErrors = $validator->validate($post);
            
            if (sizeof($listErrors) > 0) {
                foreach ($listErrors as $currError) {
                    $this->addFlash('error', '[' . strtoupper($currError->getPropertyPath()) . '] ' . $currError->getMessage());
                }
                
                // save entered data to make it available in the editor again
                $session = $request->getSession();
                $session->set('editor_data', [
                    'title'     => $request->request->get('title'),
                    'status'    => $request->request->get('status'),
                    'content'   => $request->request->get('content'),
                    'email'     => $request->request->get('email')
                ]);
            } else {
                $entityManager->persist($post);
                $entityManager->flush();
                
                $this->addFlash('success', 'Blog post "' . $post->getTitle() . '" was successfully saved!');
                
                $success = true;
            }
        } catch (Exception $e) {
            $this->addFlash('error', $e->getMessage());
        }
        
        // in case it wasn't possible to save the blog post successfully, redirect to the editor form
        if (!$success) {
            return $this->redirectToRoute((empty($id)) ? 'admin_post_editor' : 'admin_post_edit', [
                'id' => $id
            ]);
        } else {
            return $this->redirectToRoute('admin_post_overview', [
                'pageIndex' => 0
            ]);
        }
    }
}