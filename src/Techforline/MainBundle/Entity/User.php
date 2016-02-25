<?php
/**
 * Created by PhpStorm.
 * User: kodiers
 * Date: 19/02/16
 * Time: 03:57
 *
 * User entity
 *
 */
namespace Techforline\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use FOS\UserBundle\Entity\User as BaseUser;

/**
 * @ORM\Table(name="users")
 * @ORM\Entity()
 * @UniqueEntity(fields="email", message="Email already taken")
 * @UniqueEntity(fields="username", message="Username already taken")
 */
//class User extends BaseUser implements UserInterface, \Serializable
class User extends BaseUser
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

//    /**
//     * @ORM\Column(type="string", length=50, unique=true)
//     * @Assert\NotBlank()
//     */
//    protected $username;
//
//    /**
//     * @ORM\Column(type="string", length=64)
//     */
//    protected $password;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(max=4096)
     */
    protected $plainPassword;

//    /**
//     * @ORM\Column(type="string", length=50, unique=true)
//     * @Assert\NotBlank()
//     * @Assert\Email()
//     */
//    protected $email;

    /**
     * @ORM\Column(type="boolean", length=64)
     */
    private $isActive;

    /**
     *
     */
    public function __construct()
    {
        parent::__construct();
        $this->isActive = true;
        $this->enabled = true;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    public function getSalt()
    {
        return null;
    }

    public function getRoles()
    {
        return array('ROLE_USER');
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    public function serialize()
    {
        return serialize(array(
            $this->getId(),
            $this->getUsername(),
            $this->getPassword()
        ));
    }

    public function unserialize($serialized)
    {
       list(
           $this->id,
           $this->username,
           $this->password
           ) = unserialize($serialized);
    }

    /**
     * @return mixed
     */
    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    /**
     * @param mixed $plainPassword
     */
    public function setPlainPassword($plainPassword)
    {
        $this->plainPassword = $plainPassword;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }





}