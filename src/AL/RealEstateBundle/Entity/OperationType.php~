<?php

namespace AL\RealEstateBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OperationType
 */
class OperationType
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $type;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $operation_types;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->operation_types = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set type
     *
     * @param string $type
     * @return OperationType
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Add operation_types
     *
     * @param \AL\RealEstateBundle\Entity\RealEstate $operationTypes
     * @return OperationType
     */
    public function addOperationType(\AL\RealEstateBundle\Entity\RealEstate $operationTypes)
    {
        $this->operation_types[] = $operationTypes;

        return $this;
    }

    /**
     * Remove operation_types
     *
     * @param \AL\RealEstateBundle\Entity\RealEstate $operationTypes
     */
    public function removeOperationType(\AL\RealEstateBundle\Entity\RealEstate $operationTypes)
    {
        $this->operation_types->removeElement($operationTypes);
    }

    /**
     * Get operation_types
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOperationTypes()
    {
        return $this->operation_types;
    }
    public function __toString()
    {
        return $this->getType();
    }
}
