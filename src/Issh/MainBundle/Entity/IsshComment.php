<?php

namespace Issh\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="IsshComment")
 * @ORM\HasLifecycleCallbacks
 */
class IsshComment
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\Column(type="text")
     */
    protected $text;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $created;
    
    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $updated;
    
     /**
     * @ORM\ManyToOne(targetEntity="IsshPost", inversedBy="IsshComment")
     * @ORM\JoinColumn(name="postId", referencedColumnName="id")
     */
    protected $IsshPost;

    /**
     * @ORM\ManyToOne(targetEntity="IsshUser", inversedBy="IsshComment")
     * @ORM\JoinColumn(name="userId", referencedColumnName="id")
     */
    protected $IsshUser;
    
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
     * Invoked before the entity is updated.
     *
     * @ORM\PreUpdate
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

    /**
     * Add IsshStinger
     *
     * @param Issh\MainBundle\Entity\IsshStinger $isshStinger
     */
    public function addIsshStinger(\Issh\MainBundle\Entity\IsshStinger $isshStinger)
    {
        $this->IsshStinger[] = $isshStinger;
    }

    /**
     * Get IsshStinger
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getIsshStinger()
    {
        return $this->IsshStinger;
    }

    /**
     * Add IsshSlaptastic
     *
     * @param Issh\MainBundle\Entity\IsshSlaptastic $isshSlaptastic
     */
    public function addIsshSlaptastic(\Issh\MainBundle\Entity\IsshSlaptastic $isshSlaptastic)
    {
        $this->IsshSlaptastic[] = $isshSlaptastic;
    }

    /**
     * Get IsshSlaptastic
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getIsshSlaptastic()
    {
        return $this->IsshSlaptastic;
    }
}