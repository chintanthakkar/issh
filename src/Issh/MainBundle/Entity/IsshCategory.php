<?php

namespace Issh\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="IsshCategory")
 * @ORM\HasLifecycleCallbacks
 */
class IsshCategory
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length="255")
     */
    private $name;

    /**
     * @ORM\Column(type="string", length="255")
     */
    private $slug;

    /**
     * @ORM\OneToMany(targetEntity="IsshPost", mappedBy="IsshCategory")
     */
    protected $IsshPost;

    public function __construct()
    {
        $this->IsshPost = new ArrayCollection();
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
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set slug
     *
     * @param string $slug
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Add IsshPost
     *
     * @param Issh\MainBundle\Entity\IsshPost $isshPost
     */
    public function addIsshPost(\Issh\MainBundle\Entity\IsshPost $isshPost)
    {
        $this->IsshPost[] = $isshPost;
    }

    /**
     * Get IsshPost
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getIsshPost()
    {
        return $this->IsshPost;
    }
}