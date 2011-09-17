<?php

namespace Issh\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Issh\MainBundle\Entity\IsshPost
 */
class IsshPost
{
    /**
     * @var integer $id
     */
    protected $id;

    /**
     * @var text $text
     */
    protected $text;

    /**
     * @var integer $userId
     */
    protected $userId;

    /**
     * @var datetime $created
     */
    protected $created;

    /**
     * @var datetime $updated
     */
    protected $updated;    
    
    /**
     * @var integer $categoryId
     */
    protected $categoryId;

     /**
     * @ORM\ManyToOne(targetEntity="IsshCategory", inversedBy="IsshPost")
     * @ORM\JoinColumn(name="categoryId", referencedColumnName="id")
     */
    protected $IsshCategory;
        
    /**
     * @ORM\ManyToOne(targetEntity="IsshUser", inversedBy="IsshPost")
     * @ORM\JoinColumn(name="userId", referencedColumnName="id")
     *
     * @var IsshUser $IsshUser
     */
    protected $IsshUser;
 
    
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
     * @ORM\OneToMany(targetEntity="IsshComment", mappedBy="IsshPost")
     */
    protected $IsshComment;
     /**
     * @ORM\OneToMany(targetEntity="IsshStinger", mappedBy="IsshPost")
     */
    protected $IsshStinger;
     /**
     * @ORM\OneToMany(targetEntity="IsshSlaptastic", mappedBy="IsshPost")
     */
    protected $IsshSlaptastic;
    
    public function __construct()
    {
        $this->IsshComment = new ArrayCollection();
        $this->IsshStinger = new ArrayCollection();
        $this->IsshSlaptastic = new ArrayCollection();
    }
    
    /**
     * Set text
     *
     * @param text $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * Get text
     *
     * @return text 
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * Get userId
     *
     * @return integer 
     */
    public function getUserId()
    {
        return $this->userId;
    }



    /**
     * Set created
     *
     * @param datetime $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
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
     * Set categoryId
     *
     * @param integer $categoryId
     */
    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;
    }

    /**
     * Get categoryId
     *
     * @return integer 
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * Set updated
     *
     * @param datetime $updated
     */
    public function setUpdated()
    {
        $this->updated = new \DateTime();
    }

    /**
     * Get updated
     *
     * @return datetime 
     */
    public function getUpdated()
    {
        return $this->updated;
    }
}