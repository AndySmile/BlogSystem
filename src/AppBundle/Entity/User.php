<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * BlogSystem - User Entity.
 *
 * @author      Andy Liebke <info@andysmiles4games.com>
 * @version     0.2.0 26-Mar-16
 * @copyright   Copyright (c) 2016 by Andy Liebke. All rights reserved. (http://andysmiles4games.com)
 *
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
 class User implements UserInterface, \Serializable
 {
     /**
      * Stores the ID of this user.
      *
      * @ORM\Column(type="integer")
      * @ORM\Id
      */
     protected $id = null;
     
     /**
      * Stores the active state of this user.
      *
      * @ORM\Column(name="is_active", type="integer")
      */
     protected $isActive = false;
     
     /**
      * @ORM\Column(type="string")
      */
     protected $nickname = '';
     
     /**
      * @ORM\Column(type="string")
      */
     protected $email = '';
     
     /**
      * @ORM\Column(type="string")
      */
     private $password = '';
     
     public function setUsername($username)
     {
         $this->email = $username;
         
         return $this;
     }
     
     public function getUsername()
     {
         return $this->email;
     }
     
     public function getPassword()
     {
         return $this->password;
     }
     
     public function getSalt()
     {
         return null;
     }
     
     public function getRoles()
     {
         return ['ROLE_ADMIN'];
     }
     
     public function eraseCredentials()
     {
         
     }
     
     public function serialize()
     {
         return serialize([$this->id, $this->email, $this->password]);
     }
     
     public function unserialize($serialized)
     {
         list($this->id, $this->email, $this->password) = unseralize($serialized);
     }
 
    /**
     * Set id
     *
     * @param integer $id
     * @return User
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
     * Set isActive
     *
     * @param integer $isActive
     * @return User
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return integer 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Set nickname
     *
     * @param string $nickname
     * @return User
     */
    public function setNickname($nickname)
    {
        $this->nickname = $nickname;

        return $this;
    }

    /**
     * Get nickname
     *
     * @return string 
     */
    public function getNickname()
    {
        return $this->nickname;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }
}
