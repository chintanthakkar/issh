<?php

namespace Issh\MainBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * Issh\MainBundle\Entity\IsshUser
 */
class IsshUser implements UserInterface
{
    /**
     * @var integer $id
     */
    protected $id;

    /**
     * @var string $firstName
     */
    protected $firstName;

    /**
     * @var string $lastName
     */
    protected $lastName;

    /**
     * @var string $userName
     */
    protected $userName;

    /**
     * @var string $password
     */
    protected $password;

    /**
     * @var string $salt
     */
    protected $salt;

     /**
     * @var string created
     */
    protected $created;

     /**
     * @var string roles
     */
    protected $roles;

     /**
     * @ORM\OneToMany(targetEntity="IsshPost", mappedBy="IsshUser")
     * @ORM\OrderBy({"createdAt" = "DESC"})
     *
     * @var ArrayCollection $IsshPost
     */
    protected $IsshPost;
    
    public function __construct() 
    { 
        $this->Isshpost = new ArrayCollection();
//        $this->roles = new \Doctrine\Common\Collections\ArrayCollection(); 
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
     * Set firstName
     *
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set userName
     *
     * @param string $userName
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;
    }

    /**
     * Get userName
     *
     * @return string 
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * Set password
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set salt
     *
     * @param string $salt
     */
    public function setSalt()
    {
        // Create a 256 bit (64 characters) long random salt
        // Let's add 'something random' and the username
        // to the salt as well for added security
        $this->salt = hash('sha256', uniqid(mt_rand(), true) . 'You Shall Be Slapped!' . strtolower($this->userName));
    }

    /**
     * Get salt
     *
     * @return string 
     */
    public function getSalt()
    {
        return $this->salt;
    }
    


    /**
     * Set created
     *
     * @param datetime $created
     */
    public function setCreated()
    {        
        $this->created = new \DateTime("now");
    }

    /**
     * Get created
     *
     * @return datetime 
     */
    public function getCreated()
    {
        return $this->created;
    }
    
     /**
     * Set roles
     * 
     * @param datetime $roles
     */
    public function setRoles($roles)
    {
        $this->roles = serialize($roles);
    }
    /*******
     * abstract function from userinterface class
     */
    public function equals(UserInterface $user) {
        if ($user->userName !== $this->userName)
            return false;
        
        return true;
    }

    
     /*******
     * abstract function from userinterface class
     */
    public function eraseCredentials() {
        $this->password = "";
        $this->salt = "";
    }

    
     /*******
     * abstract function from userinterface class
     */
    public function getRoles() {return unserialize($this->roles);}

    /**
     * @var string $email
     */
    protected $email;

    /**
     * @var string $token
     */
    protected $token;

    /**
     * @var datetime $lastLogin
     */
    protected $lastLogin;


    /**
     * Set email
     *
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
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

    /**
     * Set token
     *
     * @param string $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

    /**
     * Get token
     *
     * @return string 
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Set lastLogin
     *
     * @param datetime $lastLogin
     */
    public function setLastLogin($lastLogin)
    {
        $this->lastLogin = $lastLogin;
    }

    /**
     * Get lastLogin
     *
     * @return datetime 
     */
    public function getLastLogin()
    {
        return $this->lastLogin;
    }
    
    public function isUserNameDuplicate()
    {
        return;
    }
}