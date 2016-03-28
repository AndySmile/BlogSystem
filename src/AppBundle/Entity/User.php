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
      * Stores nickname of this user.
      *
      * @ORM\Column(type="string")
      */
     protected $nickname = '';
     
     /**
      * Stores email of this user.
      *
      * @ORM\Column(type="string")
      */
     protected $email = '';
     
     /**
      * Stores password of this user.
      *
      * @ORM\Column(type="string")
      */
     private $password = '';
     
     /**
      * Assignes username to this user.
      *
      * @param string $username - username
      *
      * @return User - this instance
      */
     public function setUsername($username)
     {
         $this->email = $username;
         
         return $this;
     }
     
     /**
      * Returns username.
      *
      * @return string - username
      */
     public function getUsername()
     {
         return $this->email;
     }
     
     /**
      * Returns password.
      *
      * @return string - user password
      */
     public function getPassword()
     {
         return $this->password;
     }
     
     /**
      * Returns password salt.
      *
      * @return null - not in use for this user implementation
      */
     public function getSalt()
     {
         return null;
     }
     
     /**
      * Returns roles of this user.
      *
      * @return string[] - list of roles this user is assigned to
      */
     public function getRoles()
     {
         return ['ROLE_ADMIN'];
     }
     
     /**
      * Erases credentials.
      */
     public function eraseCredentials()
     {
         
     }
     
     /**
      * Serializes user data.
      *
      * @return string - serialized data
      */
     public function serialize()
     {
         return serialize([$this->id, $this->email, $this->password]);
     }
     
     /**
      * Unserialized user data.
      *
      * @param string $serialized - serialized user data
      */
     public function unserialize($serialized)
     {
         list($this->id, $this->email, $this->password) = unseralize($serialized);
     }
 
    /**
     * Assignes identification number to this user.
     *
     * @param integer $id - identification number
     *
     * @return User - this instance
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Returns identification number of this user.
     *
     * @return integer - user identification number
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Assignes active status to this user.
     *
     * @param integer $isActive - status number
     *
     * @return User - this instance
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Returns active status of this user.
     *
     * @return integer - active status
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Assigns a nickname to this user.
     *
     * @param string $nickname - user nickname
     *
     * @return User - this instance
     */
    public function setNickname($nickname)
    {
        $this->nickname = $nickname;

        return $this;
    }

    /**
     * Returns nickname of this user.
     *
     * @return string - user nickname
     */
    public function getNickname()
    {
        return $this->nickname;
    }

    /**
     * Assignes the password to this user.
     *
     * @param string $password - user password
     *
     * @return User - this instance
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }
}
