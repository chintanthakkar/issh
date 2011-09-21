<?php

namespace Issh\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Issh\MainBundle\Entity\IsshComment
 */
class IsshComment
{
    /**
     * @var integer $id
     */
    protected $id;

    /**
     * @var integer $postId
     */
    protected $postId;

    /**
     * @var integer $userId
     */
    protected $userId;
    
    /**
     * @var text $text
     */
    protected $text;

    /**
     * @var datetime $created
     */
    protected $created;
    
    /**
     * @var datetime $updated
     */
    protected $updated;
    
     /**
     * @ORM\ManyToOne(targetEntity="IsshPost", inversedBy="IsshComment")
     * @ORM\JoinColumn(name="postId", referencedColumnName="id")
     */
    protected $IsshPost;

     /**
     * @ORM\OneToMany(targetEntity="IsshStinger", mappedBy="IsshComment")
     */
    
    protected $IsshStinger;
     /**
     * @ORM\OneToMany(targetEntity="IsshSlaptastic", mappedBy="IsshComment")
     */
    protected $IsshSlaptastic;
    
    public function __construct()
    {
        $this->IsshStinger = new ArrayCollection();
        $this->IsshSlaptastic = new ArrayCollection();
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