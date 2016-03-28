<?php
namespace AppBundle\Model;

/**
 * BlogSystem - Pagination repository interface.
 *
 * @author      Andy Liebke <info@andysmiles4games.com>
 * @version     0.1.0 27-Mar-16
 * @copyright   Copyright (c) 2016 by Andy Liebke. All rights reserved. (http://andysmiles4games.com)
 */
interface PaginationRepositoryInterface
{
    /**
     * Returns items within a particular defined range.
     *
     * @param int $limit    - limit of items which should be retured
     * @param int $offset   - offset value
     *
     * @return mixed[] - list of entity objects
     */
    public function getAll($limit, $offset);
    
    /**
     * Returns total number of items.
     *
     * @return int - total number of items in the database
     */
    public function getTotalNum();
}