<?php
namespace AppBundle\Model;

/**
 * @author      Andy Liebke <info@andysmiles4games.com>
 * @version     0.1.0 27-Mar-16
 * @copyright   Copyright (c) 2016 by Andy Liebke. All rights reserved. (http://andysmiles4games.com)
 */
class Pagination
{
    protected $repository = null;
    protected $pageIndex = 0;
    protected $maxPageItems = 10;
    protected $numPages = 0;
    
    public function __construct(PaginationRepositoryInterface $repository = null)
    {
        if ($repository !== null) {
            $this->setRepository($repository);
            $this->calculate();
        }
    }
    
    public function getNumPages()
    {
        return $this->numPages;
    }
    
    public function setPageIndex($pageIndex)
    {
        $this->pageIndex = (int)$pageIndex;
    }
    
    public function setMaxPageItems($maxPageItems)
    {
        $this->maxPageItems = (int)$maxPageItems;
    }
    
    public function setRepository(PaginationRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
    
    public function calculate()
    {
        if ($this->repository === null) {
            throw new LogicException(__METHOD__ . ' Failure: no repository defined!');
        }
        
        $this->total    = $this->repository->getTotalNum();
        $this->numPages = ($this->total > 0) ? ceil((float)$this->total / (float)$this->maxPageItems) : 0;
    }
    
    public function getPageItems()
    {
        return $this->repository->getAll($this->maxPageItems, $this->pageIndex * $this->maxPageItems);
    }
}