<?php

namespace Memegif\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Meme
 *
 * @ORM\Table(name="meme")
 * @ORM\Entity(repositoryClass="Memegif\FrontBundle\Entity\MemeRepository")
 */
class Meme
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
     * @ORM\Column(name="img_url", type="string", length=512, nullable=false)
     * @Assert\Url()
     */
    private $imgUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="string", length=1024, nullable=false)
     * @Assert\NotBlank()
     */
    private $message;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=64, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="lang", type="string", length=2, nullable=false)
     */
    private $lang;

    /**
     * @var string
     *
     * @ORM\Column(name="signature", type="string", length=64, nullable=false)
     */
    private $signature;

    /**
     * @var integer
     *
     * @ORM\Column(name="nb_impression", type="integer", nullable=false)
     */
    private $nbImpression = 0;

    /**
     * @var boolean
     *
     * @ORM\Column(name="moderated", type="boolean", nullable=false)
     */
    private $moderated = 0;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="insert_date", type="datetime", nullable=false)
     */
    private $insertDate;

    private $permalink;


    public static function permalinkToId($permalink)
    {
        return base_convert($permalink, 36, 10);
    }

    public function buildPermalink()
    {
        if (is_null($this->id))
            return;

        $this->permalink = base_convert($this->id, 10, 36);
    }

    public function buildSignature()
    {
        if (is_null($this->imgUrl) || is_null($this->message))
            return;

        $this->signature = sha1($this->imgUrl.$this->message.$this->id);
    }

    public function getPermalink()
    {
        return $this->permalink;
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
     * Set imgUrl
     *
     * @param string $imgUrl
     * @return Meme
     */
    public function setImgUrl($imgUrl)
    {
        $this->imgUrl = $imgUrl;

        return $this;
    }

    /**
     * Get imgUrl
     *
     * @return string
     */
    public function getImgUrl()
    {
        return $this->imgUrl;
    }

    /**
     * Set message
     *
     * @param string $message
     * @return Meme
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Meme
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
     * Set lang
     *
     * @param string $lang
     * @return Meme
     */
    public function setLang($lang)
    {
        $this->lang = $lang;

        return $this;
    }

    /**
     * Get lang
     *
     * @return string
     */
    public function getLang()
    {
        return $this->lang;
    }

    /**
     * Set signature
     *
     * @param string $signature
     * @return Meme
     */
    public function setSignature($signature)
    {
        $this->signature = $signature;

        return $this;
    }

    /**
     * Get signature
     *
     * @return string
     */
    public function getSignature()
    {
        return $this->signature;
    }

    /**
     * Set nbImpression
     *
     * @param integer $nbImpression
     * @return Meme
     */
    public function setNbImpression($nbImpression)
    {
        $this->nbImpression = $nbImpression;

        return $this;
    }

    /**
     * Get nbImpression
     *
     * @return integer
     */
    public function getNbImpression()
    {
        return $this->nbImpression;
    }

    /**
     * Set moderated
     *
     * @param boolean $moderated
     * @return Meme
     */
    public function setModerated($moderated)
    {
        $this->moderated = $moderated;

        return $this;
    }

    /**
     * Get moderated
     *
     * @return boolean
     */
    public function getModerated()
    {
        return $this->moderated;
    }

    /**
     * Set insertDate
     *
     * @param \DateTime $insertDate
     * @return Meme
     */
    public function setInsertDate($insertDate)
    {
        $this->insertDate = $insertDate;

        return $this;
    }

    /**
     * Get insertDate
     *
     * @return \DateTime
     */
    public function getInsertDate()
    {
        return $this->insertDate;
    }
}