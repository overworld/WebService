<?php


namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping\OneToMany;


/**
 * @ApiResource
 * @ORM\Entity
 */
class User implements UserInterface
{
    /**
     * @ORM\Column(name = "id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name = "username", type="string" ,length=255)
     */
    protected $username;
    /**
     * @ORM\Column(name = "password", type="string" ,length=255)
     */
    protected $password;
    /**
     * @ORM\Column(name = "name", type="string" ,length=255, nullable = true)
     */
    protected $name;
    /**
     * @ORM\Column(name = "isActive", type="boolean" ,length=255)
     */
    protected $isActive;

    /**
     * @OneToMany(targetEntity="Cart", mappedBy="user")
     */
    protected $carts;


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * @param mixed $isActive
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    }

    public function __construct()
    {
        $this->isActive = true;
    }

    /**
     * @return mixed
     */
    public function getCarts()
    {
        return $this->carts;
    }

    /**
     * @param mixed $carts
     */
    public function setCarts($carts): void
    {
        $this->carts = $carts;
    }

    public function getRoles()
    {
        return array('ROLE_USER');
    }

    public function eraseCredentials()
    {

    }
    public function getSalt()
    {
        return null;
    }

    public function __toString()
    {
        return strval( $this->getId() );
    }
}