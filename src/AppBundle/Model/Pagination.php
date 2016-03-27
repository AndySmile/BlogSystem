<?php
namespace AppBundle\Model;

/**
 * BlogSystem - Pagination Model.
 *
 * @author      Andy Liebke <info@andysmiles4games.com>
 * @version     0.1.0 27-Mar-16
 * @copyright   Copyright (c) 2016 by Andy Liebke. All rights reserved. (http://andysmiles4games.com)
 */
class Pagination
{
    /**
     * Stores respository that holds all the data.
     */
    protected $repository = null;
    
    /**
     * Stores page index.
     */
    protected $pageIndex = 0;
    
    /**
     * Stores amount of items per page.
     */
    protected $maxPageItems = 10;
    
    /**
     + Stores amount of pages.
     */
    protected $numPages = 0;
    
    /**
     * Initilizes this pagination object by a repository.
     *
     * @param PaginationRepositoryInterface $repository - storage that includes all the listing items
     */
    public function __construct(PaginationRepositoryInterface $repository = null)
    {
        if ($repository !== null) {
            $this->setRepository($repository);
            $this->calculate();
        }
    }
    
    /**
     * Returns amount of pages.
     *
     * @return int - amount of pages
     */
    public function getNumPages()
    {
        return $this->numPages;
    }
    
    /**
     * Assigns page index.
     *
     * @param int $pageIndex - current page index
     *
     * @return Pagination - this instance of this class
     */
    public function setPageIndex($pageIndex)
    {
        $this->pageIndex = (int)$pageIndex;
        
        return $this;
    }
    
    /**
     * Assigns max amount of items per page.
     *
     * @param int $maxPageItems - max amount of items per page
     *
     * @return Pagination - this instance of this class
     */
    public function setMaxPageItems($maxPageItems)
    {
        $this->maxPageItems = (int)$maxPageItems;
        
        return $this;
    }
    
    /**
     * Assigns repository to this pagination object.
     *
     * @param PaginationRepositoryInterface $repository - storage that includes all the listing items
     *
     * @return Pagination - this instance of this class
     */
    public function setRepository(PaginationRepositoryInterface $repository)
    {
        $this->repository = $repository;
        
        return $this;
    }
    
    /**
     * Calculates all the data to handle the pages for the repository.
     *
     * @throws LogicException - in case that no repository was assigned to this pagination object
     *
     * @return Pagination - this instance of this class
     */
    public function calculate()
    {
        if ($this->repository === null) {
            throw new LogicException(__METHOD__ . ' Failure: no repository defined!');
        }
        
        $this->total    = $this->repository->getTotalNum();
        $this->numPages = ($this->total > 0) ? ceil((float)$this->total / (float)$this->maxPageItems) : 0;
        
        return $this;
    }
    
    /**
     * Returns page items.
     *
     * @return mixed[] - all items for the current assigned page index
     */
    public function getPageItems()
    {
        return $this->repository->getAll($this->maxPageItems, $this->pageIndex * $this->maxPageItems);
    }
}