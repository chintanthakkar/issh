<?php

namespace Issh\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Issh\MainBundle\Entity\IsshCategory
 */
class IsshCategory
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $name
     */
    private $name;

     /**
     * @var string $slug
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
}