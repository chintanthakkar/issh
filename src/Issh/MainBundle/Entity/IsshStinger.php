<?php

namespace Issh\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Issh\MainBundle\Entity\IsshStinger
 */
class IsshStinger
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var integer $userId
     */
    private $userId;

    /**
     * @var integer $postId
     */
    private $postId;

    /**
     * @var integer $commentId
     */
    private $commentId;

    /**
     * @var datetime $created
     */
    private $created;

     /**
     * @ORM\ManyToOne(targetEntity="IsshPost", inversedBy="IsshStinger")
     * @ORM\JoinColumn(name="postId", referencedColumnName="id")
     */
    protected $IsshPost;

     /**
     * @ORM\ManyToOne(targetEntity="IsshComment", inversedBy="IsshStinger")
     * @ORM\JoinColumn(name="commentId", referencedColumnName="id")
     */
    protected $IsshComment;
    
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
     * Set commentId
     *
     * @param integer $commentId
     */
    public function setCommentId($commentId)
    {
        $this->commentId = $commentId;
    }

    /**
     * Get commentId
     *
     * @return integer 
     */
    public function getCommentId()
    {
        return $this->commentId;
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
}