<?php

namespace AL\RealEstateBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * User
 */
class User extends BaseUser
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;


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
        parent::__construct();
        $this->setCreatedAtValue();
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
     * @return User
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
     * @return User
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
     * @return User
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
     * @return User
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
     * @return User
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

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Add real_estate_objects
     *
     * @param \AL\RealEstateBundle\Entity\RealEstate $realEstateObjects
     * @return User
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
        $this->created_at = new \DateTime();
    }
    public function __toString()
    {
        return $this->getName();
    }
    public function getRoles()
    {
        return array('ROLE_ADMIN');
    }

    public function getSalt()
    {
        return null;
    }

    public function eraseCredentials()
    {

    }
    public function equals(UserInterface $user)
    {
        return $user->getUsername() == $this->getUsername();
    }


}
