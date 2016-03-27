<?php
namespace AppBundle\Model;

/**
 * @version     0.1.0 27-Mar-16
 * @copyright   Copyright (c) 2016 by Andy Liebke. All rights reserved. (http://andysmiles4games.com)
 */
interface PaginationRepositoryInterface
{
    public function getAll($limit, $offset);
    public function getTotalNum();
}