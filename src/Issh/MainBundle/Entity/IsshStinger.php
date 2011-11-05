<?php

namespace Issh\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="IsshStinger")
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="Issh\MainBundle\Repository\IsshStingerRepository")
 */
class IsshStinger
{
    /**
     * @ORM\id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $created;

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
     * @ORM\ManyToOne(targetEntity="IsshUser", inversedBy="IsshStinger")
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
     * Invoked before the entity is updated.
     *
     * @ORM\PrePersist
     */ 
    public function setCreated()
    {
        $this->created = new \DateTime();
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