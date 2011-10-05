<?php

namespace Issh\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="IsshPost")
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="Issh\MainBundle\Repository\IsshPostRepository")
 */
class IsshPost
{
    /**
     * @ORM\id
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
     * @ORM\ManyToOne(targetEntity="IsshCategory", inversedBy="IsshPost")
     * @ORM\JoinColumn(name="categoryId", referencedColumnName="id")
     */
    protected $IsshCategory;
        
    /**
     * @ORM\ManyToOne(targetEntity="IsshUser", inversedBy="IsshPost")
     * @ORM\JoinColumn(name="userId", referencedColumnName="id", nullable=false) 
     */
    protected $IsshUser;

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
     * Set IsshCategory
     *
     * @param Issh\MainBundle\Entity\IsshCategory $isshCategory
     */
    public function setIsshCategory(\Issh\MainBundle\Entity\IsshCategory $isshCategory)
    {
        $this->IsshCategory = $isshCategory;
    }

    /**
     * Get IsshCategory
     *
     * @return Issh\MainBundle\Entity\IsshCategory 
     */
    public function getIsshCategory()
    {
        return $this->IsshCategory;
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
     * Add IsshComment
     *
     * @param Issh\MainBundle\Entity\IsshComment $isshComment
     */
    public function addIsshComment(\Issh\MainBundle\Entity\IsshComment $isshComment)
    {
        $this->IsshComment[] = $isshComment;
    }

    /**
     * Get IsshComment
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getIsshComment()
    {
        return $this->IsshComment;
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
    
}