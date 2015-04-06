<?php

namespace AL\RealEstateBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Owner
 */
class Owner
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
     * @var string
     */
    private $email;

    /**
     * @var integer
     */
    private $phone_number;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var string
     */
    private $token;

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
     * @return Owner
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
     * Set email
     *
     * @param string $email
     * @return Owner
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set phone_number
     *
     * @param integer $phoneNumber
     * @return Owner
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phone_number = $phoneNumber;

        return $this;
    }

    /**
     * Get phone_number
     *
     * @return integer 
     */
    public function getPhoneNumber()
    {
        return $this->phone_number;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return Owner
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;

        return $this;
    }

    /**
     * Get created_at
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set token
     *
     * @param string $token
     * @return Owner
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Get token
     *
     * @return string 
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Add real_estate_objects
     *
     * @param \AL\RealEstateBundle\Entity\RealEstate $realEstateObjects
     * @return Owner
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
    /**
     * @ORM\PrePersist
     */
    public function setCreatedAtValue()
    {
        // Add your code here
    }
    public function __toString()
    {
        return $this->getName();
    }

}
