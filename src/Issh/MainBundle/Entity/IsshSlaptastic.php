<?php

namespace Issh\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="IsshSlaptastic")
 */
class IsshSlaptastic
{
    /**
     * @ORM\id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * @ORM\Column(type="datetime")
     */
    private $created;

     /**
     * @ORM\ManyToOne(targetEntity="IsshPost", inversedBy="IsshSlaptastic")
     * @ORM\JoinColumn(name="postId", referencedColumnName="id")
     */
    protected $IsshPost;
    
     /**
     * @ORM\ManyToOne(targetEntity="IsshComment", inversedBy="IsshSlaptastic")
     * @ORM\JoinColumn(name="commentId", referencedColumnName="id")
     */
    protected $IsshComment;
    
    /**
     * @ORM\ManyToOne(targetEntity="IsshUser", inversedBy="IsshSlaptastic")
     * @ORM\JoinColumn(name="userId", referencedColumnName="id")
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
     * Set IsshPost
     *
     * @param Issh\MainBundle\Entity\IsshPost $isshPost
     */
    public function setIsshPost(\Issh\MainBundle\Entity\IsshPost $isshPost)
    {
        $this->IsshPost = $isshPost;
    }

    /**
     * Get IsshPost
     *
     * @return Issh\MainBundle\Entity\IsshPost 
     */
    public function getIsshPost()
    {
        return $this->IsshPost;
    }

    /**
     * Set IsshComment
     *
     * @param Issh\MainBundle\Entity\IsshComment $isshComment
     */
    public function setIsshComment(\Issh\MainBundle\Entity\IsshComment $isshComment)
    {
        $this->IsshComment = $isshComment;
    }

    /**
     * Get IsshComment
     *
     * @return Issh\MainBundle\Entity\IsshComment 
     */
    public function getIsshComment()
    {
        return $this->IsshComment;
    }

    /**
     * Set IsshUser
     *
     * @param Issh\MainBundle\Entity\IsshUser $isshUser
     */
    public function setIsshUser(\Issh\MainBundle\Entity\IsshUser $isshUser)
    {
        $this->IsshUser = $isshUser;
    }

    /**
     * Get IsshUser
     *
     * @return Issh\MainBundle\Entity\IsshUser 
     */
    public function getIsshUser()
    {
        return $this->IsshUser;
    }
}