<?php
// src/AppBundle/Entity/User.php

namespace Worker\UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use DateTime;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     * @ORM\Column(name="firstname",type="string", length=150)
     */
    protected $firstname;
    
    /**
     * @var string
     * @ORM\Column(name="lastname",type="string", length=150)
     */
    protected $lastname;

    /**
     * @var string
     * @ORM\Column(name="mobile",type="string", length=150,nullable=true)
     */
    protected $mobile;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="Worker\UserBundle\Entity\Category")
     * @ORM\JoinColumn(name="category", referencedColumnName="id", nullable=true)
     */
    protected $category;
        
     /**
     * @var string
     * @ORM\Column(name="is_hired", type="smallint")
     */
    protected $isHired = 0;
    
    /**
     * @var \DateTime
     * @ORM\Column(name="hired_at", type="datetime", nullable=true)
     */
    protected $hiredat;

    /**
     * @var \DateTime
     * @ORM\Column(name="realsed_at", type="datetime", nullable=true)
     */
    protected $realsedat;

    /**
     * @var \DateTime
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     * @Gedmo\Timestampable(on="create")
     */
    protected $createdat;

    /**
     * @var \DateTime
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     * @Gedmo\Timestampable(on="update")
     */
    protected $updatedat;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
    
    public function __construct()
    {
        parent::__construct();
        $this->roles = array('ROLE_USER');
        
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     * @return User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string 
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return User
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string 
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set mobile
     *
     * @param string $mobile
     * @return User
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;

        return $this;
    }

    /**
     * Get mobile
     *
     * @return string 
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return User
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set isHired
     *
     * @param integer $isHired
     * @return User
     */
    public function setIsHired($isHired)
    {
        $this->isHired = $isHired;

        return $this;
    }

    /**
     * Get isHired
     *
     * @return integer 
     */
    public function getIsHired()
    {
        return $this->isHired;
    }

    /**
     * Set hiredat
     *
     * @param \DateTime $hiredat
     * @return User
     */
    public function setHiredat($hiredat)
    {
        $this->hiredat = $hiredat;

        return $this;
    }

    /**
     * Get hiredat
     *
     * @return \DateTime 
     */
    public function getHiredat()
    {
        return $this->hiredat;
    }

    /**
     * Set realsedat
     *
     * @param \DateTime $realsedat
     * @return User
     */
    public function setRealsedat($realsedat)
    {
        $this->realsedat = $realsedat;

        return $this;
    }

    /**
     * Get realsedat
     *
     * @return \DateTime 
     */
    public function getRealsedat()
    {
        return $this->realsedat;
    }

    /**
     * Set createdat
     *
     * @param \DateTime $createdat
     * @return User
     */
    public function setCreatedat($createdat)
    {
        $this->createdat = $createdat;

        return $this;
    }

    /**
     * Get createdat
     *
     * @return \DateTime 
     */
    public function getCreatedat()
    {
        return $this->createdat;
    }

    /**
     * Set updatedat
     *
     * @param \DateTime $updatedat
     * @return User
     */
    public function setUpdatedat($updatedat)
    {
        $this->updatedat = $updatedat;

        return $this;
    }

    /**
     * Get updatedat
     *
     * @return \DateTime 
     */
    public function getUpdatedat()
    {
        return $this->updatedat;
    }

    /**
     * Set category
     *
     * @param \Worker\UserBundle\Entity\Category $category
     * @return User
     */
    public function setCategory(\Worker\UserBundle\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \Worker\UserBundle\Entity\Category 
     */
    public function getCategory()
    {
        return $this->category;
    }
}
