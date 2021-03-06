<?php

namespace AL\RealEstateBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RealEstateCategory
 */
class RealEstateCategory
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $real_estate_objects;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->real_estate_objects = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return RealEstateCategory
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
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
     * Add real_estate_objects
     *
     * @param \AL\RealEstateBundle\Entity\RealEstate $realEstateObjects
     * @return RealEstateCategory
     */
    public function addRealEstateObject(\AL\RealEstateBundle\Entity\RealEstate $realEstateObjects)
    {
        $this->real_estate_objects[] = $realEstateObjects;

        return $this;
    }

    /**
     * Remove real_estate_objects
     *
     * @param \AL\RealEstateBundle\Entity\RealEstate $realEstateObjects
     */
    public function removeRealEstateObject(\AL\RealEstateBundle\Entity\RealEstate $realEstateObjects)
    {
        $this->real_estate_objects->removeElement($realEstateObjects);
    }

    /**
     * Get real_estate_objects
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRealEstateObjects()
    {
        return $this->real_estate_objects;
    }
    public function __toString()
    {
        return $this->getName();
    }
}
