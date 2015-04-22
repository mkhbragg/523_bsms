<?php

// src/BSMS/MainBundle/Entity/Admin.php
namespace BSMS\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Admins")
 */
class Admin
{
    /**
     * @ORM\OneToMany(targetEntity="Application", mappedBy="advisor")
     **/
    private $applications;
    /**
     * @ORM\Column(type="string")
     * @ORM\Id
     **/
    protected $username;

    /**
     * @ORM\Column(type="string")
     **/
    protected $fname;

    /**
     * @ORM\Column(type="string")
     **/
    protected $lname;

    /**
     * @ORM\Column(type="integer", length=1)
     */
    protected $access;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $actioncompleted;
    /**
     * Set username
     *
     * @param string $username
     * @return Admin
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set access
     *
     * @param integer $access
     * @return Admin
     */
    public function setAccess($access)
    {
        $this->access = $access;

        return $this;
    }

    /**
     * Get access
     *
     * @return integer 
     */
    public function getAccess()
    {
        return $this->access;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->applications = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add applications
     *
     * @param \BSMS\MainBundle\Entity\Application $applications
     * @return Admin
     */
    public function addApplication(\BSMS\MainBundle\Entity\Application $applications)
    {
        $this->applications[] = $applications;

        return $this;
    }

    /**
     * Remove applications
     *
     * @param \BSMS\MainBundle\Entity\Application $applications
     */
    public function removeApplication(\BSMS\MainBundle\Entity\Application $applications)
    {
        $this->applications->removeElement($applications);
    }

    /**
     * Get applications
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getApplications()
    {
        return $this->applications;
    }

    public function __toString(){
        return $this->username;
    }

    /**
     * Set fname
     *
     * @param string $fname
     * @return Admin
     */
    public function setFname($fname)
    {
        $this->fname = $fname;

        return $this;
    }

    /**
     * Get fname
     *
     * @return string 
     */
    public function getFname()
    {
        return $this->fname;
    }

    /**
     * Set lname
     *
     * @param string $lname
     * @return Admin
     */
    public function setLname($lname)
    {
        $this->lname = $lname;

        return $this;
    }

    /**
     * Get lname
     *
     * @return string 
     */
    public function getLname()
    {
        return $this->lname;
    }

    /**
     * Set actioncompleted
     *
     * @param boolean $actioncompleted
     * @return Admin
     */
    public function setActioncompleted($actioncompleted)
    {
        $this->actioncompleted = $actioncompleted;

        return $this;
    }

    /**
     * Get actioncompleted
     *
     * @return boolean 
     */
    public function getActioncompleted()
    {
        return $this->actioncompleted;
    }

    public function getFormChoiceProperties()
    {
        return array(
            'class' => 'BSMSMainBundle:Admin'
        );
    }
}
