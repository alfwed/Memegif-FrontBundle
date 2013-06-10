<?php

namespace Memegif\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AdminUser
 *
 * @ORM\Table(name="admin_user")
 * @ORM\Entity
 */
class AdminUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="login", type="string", length=32, nullable=false)
     */
    private $login;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=40, nullable=false)
     */
    private $password;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_seen_date", type="datetime", nullable=true)
     */
    private $lastSeenDate;



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
     * Set login
     *
     * @param string $login
     * @return AdminUser
     */
    public function setLogin($login)
    {
        $this->login = $login;
    
        return $this;
    }

    /**
     * Get login
     *
     * @return string 
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return AdminUser
     */
    public function setPassword($password)
    {
        $this->password = $password;
    
        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set lastSeenDate
     *
     * @param \DateTime $lastSeenDate
     * @return AdminUser
     */
    public function setLastSeenDate($lastSeenDate)
    {
        $this->lastSeenDate = $lastSeenDate;
    
        return $this;
    }

    /**
     * Get lastSeenDate
     *
     * @return \DateTime 
     */
    public function getLastSeenDate()
    {
        return $this->lastSeenDate;
    }
}