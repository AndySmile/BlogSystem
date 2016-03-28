<?php
namespace AppBundle\Entity;

use Doctrine\ORM\EntityRepository;
use AppBundle\Model\PaginationRepositoryInterface;

/**
 * BlogSystem - Blog Post Repository.
 *
 * @author      Andy Liebke <info@andysmiles4games.com>
 * @version     0.2.0 27-Mar-16
 * @copyright   Copyright (c) 2016 by Andy Liebke. All rights reserved. (http://andysmiles4games.com)
 */
class PostRepository extends EntityRepository implements PaginationRepositoryInterface
{
    /**
     * Returns all blog posts ordered by ID.
     *
     * @param int $limit    - limit of items which should be retured
     * @param int $offset   - offset value
     *
     * @return mixed[] - list of entity objects
     */
    public function getAll($limit = null, $offset = null)
    {
        $query = $this->createQueryBuilder('p')
                    ->orderBy('p.id', 'DESC')
                    ->getQuery();
                    
        if ((int)$limit > 0) {
            $query->setMaxResults($limit);
            
            if ((int)$offset > 0) {
                $query->setFirstResult($offset);
            }
        }
        
        return $query->getResult();
    }
    
    /**
     * Returns total number of items.
     *
     * @return int - total number of items in the database
     */
    public function getTotalNum()
    {
        return (int)$this->createQueryBuilder('p')
                            ->select('COUNT(p.id)')
                            ->getQuery()
                            ->getSingleScalarResult();
    }
}