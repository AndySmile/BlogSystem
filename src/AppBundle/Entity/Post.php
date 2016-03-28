<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * BlogSystem - Blog Post Entity.
 *
 * @author      Andy Liebke <info@andysmiles4games.com>
 * @version     0.2.1 28-Mar-16
 * @copyright   Copyright (c) 2016 by Andy Liebke. All rights reserved. (http://andysmiles4games.com)
 *
 * @ORM\Entity(repositoryClass="AppBundle\Entity\PostRepository")
 * @ORM\Table(name="posts")
 */
class Post
{
    /** 
     * Stores values for the disabled status.
     */
    const STATUS_DISABLED = 0;
    
    /** 
     * Stores values for the published status.
     */
    const STATUS_PUBLISHED = 1;
    
    /** 
     * Stores values for the draft status.
     */
    const STATUS_DRAFT = 2;
    
    /**
     * Stores identification number of this blog post.
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id = null;
    
    /**
     * Stores status of this blog post.
     *
     * @ORM\Column(type="integer")
     */
    protected $status = 0;
    
    /**
     * Stores email address of this blog post.
     *
     * @Assert\NotBlank()
     * @Assert\Email(message="Invalid email format!")
     *
     * @ORM\Column(type="string")
     */
    protected $email = '';
    
    /**
     * Stores title of this blog post.
     *
     * @Assert\NotBlank()
     *
     * @ORM\Column(type="string")
     */
    protected $title = '';
    
    /**
     * Stores content of this blog post.
     *
     * @Assert\NotBlank()
     *
     * @ORM\Column(type="string")
     */
    protected $content = '';

    /**
     * Stores date of the last update in the database.
     *
     * @ORM\Column(type="string", name="updated_at")
     */
    protected $updatedAt = null;

    /**
     * Assigns ID to this blog post.
     *
     * @param int $id - identification number for this blog post
     *
     * @return Post - this instance
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Returns identification number of this blog post.
     *
     * @return int - blog post ID 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Assigns blog post status.
     *
     * @param int $status - blog post status
     *
     * @return Post - this instance
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Returns status of this blog post.
     *
     * @return int - blog post status 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Assigns a title to this blog post.
     *
     * @param string $title - blog post title
     *
     * @return Post - this instance
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Returns title of this blog post.
     *
     * @return string - title 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Assigns content to this blog post.
     *
     * @param string $content - content for this blog post
     *
     * @return Post - this instance
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Returns content of this blog post.
     *
     * @return string - content of this blog post
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Returns timestamp of the last update
     *
     * @return int -timestamp when this blog post was updated  
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Assigns email address to this blog post.
     *
     * @param string $email - email address
     *
     * @return Post - this instance
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Returns email address of this blog post.
     *
     * @return string - email address
     */
    public function getEmail()
    {
        return $this->email;
    }
}
