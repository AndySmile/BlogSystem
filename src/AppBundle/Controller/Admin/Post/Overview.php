<?php
namespace AppBundle\Controller\Admin\Post;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Model\Pagination;

/**
 * BlogSystem - Blog post overview controller.
 *
 * @author      Andy Liebke <info@andysmiles4games.com>
 * @version     0.2.0 27-Mar-16
 * @copyright   Copyright (c) 2016 by Andy Liebke. All rights reserved. (http://andysmiles4games.com)
 */
class Overview extends Controller
{
    /**
     * Stores amount of items on one page.
     */
    const OVERVIEW_ITEMS_LIMIT = 10;
    
    /**
     * Displays overview page.
     *
     * @param Request $request  - HTTP request object
     * @param int $pageIndex    - selected page index
     *
     * @return Response - rendered HTML blog post overview page
     *
     * @Route("/admin/post/overview/{pageIndex}", name="admin_post_overview")
     */
    public function indexAction(Request $request, $pageIndex)
    {
        try {
            $repository = $this->getDoctrine()->getManager()->getRepository('AppBundle:Post');
        
            $pagination = new Pagination($repository);
            $pagination->setPageIndex($pageIndex);
            $pagination->setMaxPageItems(self::OVERVIEW_ITEMS_LIMIT);
        } catch (Exception $e) {
            $this->addFlash('error', $e->getMessage());
        }
        
        return $this->render('admin/post/overview.html.twig', [
            'list_posts' => $pagination->getPageItems(),
            'pagination' => $pagination
        ]);
    }
    
    /**
     * Removes a blog post.
     *
     * @param int $id - blog post ID
     *
     * @return Response - redirection response to the overview page
     *
     * @Route("/admin/post/delete/{id}", name="admin_post_delete")
     */
    public function deleteAction($id)
    {
        if (!empty($id)) {
            try {
                $entityManager = $this->getDoctrine()->getManager();
                $post 	       = $entityManager->getRepository('AppBundle:Post')->find($id);
                
                $entityManager->remove($post);
                $entityManager->flush();
                
                $this->addFlash('success', 'Blog post "' . $post->getTitle() . '" was successfully removed!');
            } catch (Exception $e) {
                $this->addFlash('error', $e->getMessage());
            }
        }
        
        return $this->redirectToRoute('admin_post_overview', [
            'pageIndex' => 0
        ]);
    }
}