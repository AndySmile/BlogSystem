<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @version     0.2.1 28-Mar-16
 * @copyright   Copyright (c) 2016 by Andy Liebke. All rights reserved. (http://andysmiles4games.com)
 *
 * @ORM\Entity(repositoryClass="AppBundle\Entity\PostRepository")
 * @ORM\Table(name="posts")
 */
class Post
{
    const STATUS_DISABLED = 0;
    const STATUS_PUBLISHED = 1;
    const STATUS_DRAFT = 2;
    
    /**
     * 
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id = null;
    
    /**
     * @ORM\Column(type="integer")
     */
    protected $status = 0;
    
    /**
     * @Assert\NotBlank()
     * @Assert\Email(message="Invalid email format!")
     *
     * @ORM\Column(type="string")
     */
    protected $email = '';
    
    /**
     * @Assert\NotBlank()
     *
     * @ORM\Column(type="string")
     */
    protected $title = '';
    
    /**
     * @Assert\NotBlank()
     *
     * @ORM\Column(type="string")
     */
    protected $content = '';

    /**
     * @ORM\Column(type="string", name="updated_at")
     */
    protected $updatedAt = null;

    /**
     * Set id
     *
     * @param integer $id
     * @return Post
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set status.
     *
     * @param boolean $status
     * @return Post
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Post
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return Post
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set createdAt
     *
     * @param integer $updatedAt
     * @return Post
     */
    /*public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }*/

    /**
     * Get createdAt
     *
     * @return integer 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Post
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }
}
