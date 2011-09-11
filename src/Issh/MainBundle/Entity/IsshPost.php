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
    private $id;

    /**
     * @var text $text
     */
    private $text;

    /**
     * @var integer $userId
     */
    private $userId;

    /**
     * @var datetime $created
     */
    private $created;
    
    
    /**
     * @var integer $categoryId
     */
    private $categoryId;


    /**
     * Get id
     *
     * @return integer 
     */
    
     /**
     * @ORM\ManyToOne(targetEntity="isshCategory", inversedBy="isshPost")
     * @ORM\JoinColumn(name="categoryId", referencedColumnName="id")
     */
    protected $isshCategory;
    
    public function getId()
    {
        return $this->id;
    }

     /**
     * @ORM\OneToMany(targetEntity="isshComment", mappedBy="isshPost")
     * @ORM\OneToMany(targetEntity="isshStinger", mappedBy="isshPost")
     * @ORM\OneToMany(targetEntity="isshSlaptastic", mappedBy="isshPost")
     */
    protected $isshComment;
    protected $isshStinger;
    protected $isshSlaptastic;
    
    public function __construct()
    {
        $this->isshComment = new ArrayCollection();
        $this->isshStinger = new ArrayCollection();
        $this->isshSlaptastic = new ArrayCollection();
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
}