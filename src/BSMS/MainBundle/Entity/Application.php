<?php
namespace BSMS\MainBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Applications")
 */
class Application
{
    /**
     * @ORM\ManyToOne(targetEntity="Admin", inversedBy="applications")
     * @ORM\JoinColumn(name="advisor_id", referencedColumnName="username")
     */
    private $advisor;
    /**
     * @ORM\Column(type="integer", length=9)
     * @ORM\Id
     */
    protected $pid;
    /**
     * @ORM\Column(type="string")
     */
    protected $onyen;
     /**
     * @ORM\Column(type="string")
     */
    protected $fname;
    /**
     * @ORM\Column(type="string")
     */
    protected $lname;
    /**
     * @ORM\Column(type="string")
     */
    protected $email;
    /**
     * @ORM\Column(type="string")
     */
    protected $minor;
    /**
     * @ORM\Column(type="decimal")
     */
    protected $gpa;
    /**
     * @ORM\Column(type="string", length=1)
     */
    //O: Open, A:Admitted, D:Denied
    protected $status;
    /**
     * @ORM\Column(type="string")
     */
    protected $advisor1;
     /**
     * @ORM\Column(type="string")
     */
    protected $advisor2;
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $filename1 = null;
     /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $filename2 = null;
     /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $filename3 = null;    
     /**
     * @ORM\Column(type="blob", nullable=true)
     */
    protected $file1 = null;
     /**
     * @ORM\Column(type="blob", nullable=true)
     */
    protected $file2 = null;
     /**
     * @ORM\Column(type="blob", nullable=true)
     */
    protected $file3 = null;
    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $received = null;
    /**
     * @ORM\Column(type="date", nullable=true)
     */
    protected $term = null;
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $adv1comments = null;
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $adv2comments = null;


    /**
     * Set pid
     *
     * @param integer $pid
     * @return Application
     */
    public function setPid($pid)
    {
        $this->pid = $pid;

        return $this;
    }

    /**
     * Get pid
     *
     * @return integer 
     */
    public function getPid()
    {
        return $this->pid;
    }

    /**
     * Set fname
     *
     * @param string $fname
     * @return Application
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
     * @return Application
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
     * Set email
     *
     * @param string $email
     * @return Application
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
     * Set minor
     *
     * @param string $minor
     * @return Application
     */
    public function setMinor($minor)
    {
        $this->minor = $minor;

        return $this;
    }

    /**
     * Get minor
     *
     * @return string 
     */
    public function getMinor()
    {
        return $this->minor;
    }

    /**
     * Set gpa
     *
     * @param string $gpa
     * @return Application
     */
    public function setGpa($gpa)
    {
        $this->gpa = $gpa;

        return $this;
    }

    /**
     * Get gpa
     *
     * @return string 
     */
    public function getGpa()
    {
        return $this->gpa;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return Application
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set advisor1
     *
     * @param string $advisor1
     * @return Application
     */
    public function setAdvisor1($advisor1)
    {
        $this->advisor1 = $advisor1;

        return $this;
    }

    /**
     * Get advisor1
     *
     * @return string 
     */
    public function getAdvisor1()
    {
        return $this->advisor1;
    }

    /**
     * Set advisor2
     *
     * @param string $advisor2
     * @return Application
     */
    public function setAdvisor2($advisor2)
    {
        $this->advisor2 = $advisor2;

        return $this;
    }

    /**
     * Get advisor2
     *
     * @return string 
     */
    public function getAdvisor2()
    {
        return $this->advisor2;
    }

    /**
     * Set filename1
     *
     * @param string $filename1
     * @return Application
     */
    public function setFilename1($filename1)
    {
        $this->filename1 = $filename1;

        return $this;
    }

    /**
     * Get filename1
     *
     * @return string 
     */
    public function getFilename1()
    {
        return $this->filename1;
    }

    /**
     * Set filename2
     *
     * @param string $filename2
     * @return Application
     */
    public function setFilename2($filename2)
    {
        $this->filename2 = $filename2;

        return $this;
    }

    /**
     * Get filename2
     *
     * @return string 
     */
    public function getFilename2()
    {
        return $this->filename2;
    }

    /**
     * Set filename3
     *
     * @param string $filename3
     * @return Application
     */
    public function setFilename3($filename3)
    {
        $this->filename3 = $filename3;

        return $this;
    }

    /**
     * Get filename3
     *
     * @return string 
     */
    public function getFilename3()
    {
        return $this->filename3;
    }

    /**
     * Set file1
     *
     * @param string $file1
     * @return Application
     */
    public function setFile1($file1)
    {
        $this->file1 = $file1;

        return $this;
    }

    /**
     * Get file1
     *
     * @return string 
     */
    public function getFile1()
    {
        return $this->file1;
    }

    /**
     * Set file2
     *
     * @param string $file2
     * @return Application
     */
    public function setFile2($file2)
    {
        $this->file2 = $file2;

        return $this;
    }

    /**
     * Get file2
     *
     * @return string 
     */
    public function getFile2()
    {
        return $this->file2;
    }

    /**
     * Set file3
     *
     * @param string $file3
     * @return Application
     */
    public function setFile3($file3)
    {
        $this->file3 = $file3;

        return $this;
    }

    /**
     * Get file3
     *
     * @return string 
     */
    public function getFile3()
    {
        return $this->file3;
    }

    /**
     * Set received
     *
     * @param \DateTime $received
     * @return Application
     */
    public function setReceived($received)
    {
        $this->received = $received;

        return $this;
    }

    /**
     * Get received
     *
     * @return \DateTime 
     */
    public function getReceived()
    {
        return $this->received;
    }

    /**
     * Set term
     *
     * @param \DateTime $term
     * @return Application
     */
    public function setTerm($term)
    {
        $this->term = $term;

        return $this;
    }

    /**
     * Get term
     *
     * @return \DateTime 
     */
    public function getTerm()
    {
        return $this->term;
    }

    /**
     * Set advisor
     *
     * @param \BSMS\MainBundle\Entity\Admin $advisor
     * @return Application
     */
    public function setAdvisor(\BSMS\MainBundle\Entity\Admin $advisor = null)
    {
        $this->advisor = $advisor;

        return $this;
    }

    /**
     * Get advisor
     *
     * @return \BSMS\MainBundle\Entity\Admin 
     */
    public function getAdvisor()
    {
        return $this->advisor;
    }

    /**
     * Set adv1comments
     *
     * @param string $adv1comments
     * @return Application
     */
    public function setAdv1comments($adv1comments)
    {
        $this->adv1comments = $adv1comments;

        return $this;
    }

    /**
     * Get adv1comments
     *
     * @return string 
     */
    public function getAdv1comments()
    {
        return $this->adv1comments;
    }

    /**
     * Set adv2comments
     *
     * @param string $adv2comments
     * @return Application
     */
    public function setAdv2comments($adv2comments)
    {
        $this->adv2comments = $adv2comments;

        return $this;
    }

    /**
     * Get adv2comments
     *
     * @return string 
     */
    public function getAdv2comments()
    {
        return $this->adv2comments;
    }

    /**
     * Set onyen
     *
     * @param string $onyen
     * @return Application
     */
    public function setOnyen($onyen)
    {
        $this->onyen = $onyen;

        return $this;
    }

    /**
     * Get onyen
     *
     * @return string 
     */
    public function getOnyen()
    {
        return $this->onyen;
    }
}
