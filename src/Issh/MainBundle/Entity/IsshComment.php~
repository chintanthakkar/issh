<?php

namespace Issh\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Issh\MainBundle\Entity\IsshComment
 */
class IsshComment
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var integer $postId
     */
    private $postId;

    /**
     * @var integer $userId
     */
    private $userId;
    
    /**
     * @var text $text
     */
    private $text;

    /**
     * @var datetime $created
     */
    private $created;

    /**
     * Get id
     *
     * @return integer 
     */
    
     /**
     * @ORM\ManyToOne(targetEntity="isshPost", inversedBy="isshComment")
     * @ORM\JoinColumn(name="postId", referencedColumnName="id")
     */
    protected $isshPost;

     /**
     * @ORM\OneToMany(targetEntity="isshStinger", mappedBy="isshComment")
     * @ORM\OneToMany(targetEntity="isshSlaptastic", mappedBy="isshComment")
     */
    protected $isshStinger;
    protected $isshSlaptastic;
    
    public function __construct()
    {
        $this->isshStinger = new ArrayCollection();
        $this->isshSlaptastic = new ArrayCollection();
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
     * Set postId
     *
     * @param integer $postId
     */
    public function setPostId($postId)
    {
        $this->postId = $postId;
    }

    /**
     * Get postId
     *
     * @return integer 
     */
    public function getPostId()
    {
        return $this->postId;
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
}