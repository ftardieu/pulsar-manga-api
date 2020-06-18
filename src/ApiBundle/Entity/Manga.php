<?php

namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use JMS\Serializer\Annotation as JMS;

/**
 * @ORM\Entity
 * @ORM\Table(name="manga")
 */
class Manga
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     * @JMS\Expose
     * @JMS\Groups({"mini"})
     */
    protected $id;

    /**
     * @var string
     *
     * @JMS\Expose
     * @JMS\Groups({"mini"})
     */
    protected $title;

    /**
     * @var date
     *
     * @ORM\Column(name="date_last_updated", type="datetime", nullable=true)
     *
     * @JMS\Expose
     * @JMS\Groups({"mini"})
     */
    protected $dateLastUpdated;

    /**
     * @var date
     *
     * @ORM\Column(name="date_created", type="datetime", nullable=true)
     *
     * @JMS\Expose
     * @JMS\Groups({"mini"})
     */
    protected $dateCreated;

    /**
     * @var boolean
     *
     * @ORM\Column(name="status", type="boolean", nullable=true)
     *
     * @JMS\Expose
     * @JMS\Groups({"mini"})
     */
    protected $status;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="blob", nullable=true)
     *
     * @JMS\Expose
     * @JMS\Groups({"mini"})
     */
    protected $image;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", nullable=true)
     *
     * @JMS\Expose
     * @JMS\Groups({"mini"})
     */
    protected $slug;

    /**
     * @var integer
     *
     * @ORM\Column(name="number", type="integer", nullable=true)
     *
     * @JMS\Expose
     * @JMS\Groups({"mini"})
     */
    protected $number;


    /**
     * 
     * @ORM\OneToMany(targetEntity="MangaOrigin", mappedBy="manga")
     */
    private $mangaOrigins;


    public function __construct()
    {
        parent::__construct();
        $this->mangaOrigins = new ArrayCollection();
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
     * Set dateLastUpdated
     *
     * @param \DateTime $dateLastUpdated
     *
     * @return Manga
     */
    public function setDateLastUpdated($dateLastUpdated)
    {
        $this->date_last_updated = $dateLastUpdated;

        return $this;
    }

    /**
     * Get dateLastUpdated
     *
     * @return \DateTime
     */
    public function getDateLastUpdated()
    {
        return $this->date_last_updated;
    }

    /**
     * Set dateCreated
     *
     * @param \DateTime $dateCreated
     *
     * @return Manga
     */
    public function setDateCreated($dateCreated)
    {
        $this->date_created = $dateCreated;

        return $this;
    }

    /**
     * Get dateCreated
     *
     * @return \DateTime
     */
    public function getDateCreated()
    {
        return $this->date_created;
    }

    /**
     * Set status
     *
     * @param boolean $status
     *
     * @return Manga
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return boolean
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return Manga
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return Manga
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
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

    /**
     * Set number
     *
     * @param integer $number
     *
     * @return Manga
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return integer
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Add mangaOrigin
     *
     * @param \ApiBundle\Entity\MangaOrigin $mangaOrigin
     *
     * @return Manga
     */
    public function addMangaOrigin(\ApiBundle\Entity\MangaOrigin $mangaOrigin)
    {
        $this->mangaOrigins[] = $mangaOrigin;

        return $this;
    }

    /**
     * Remove mangaOrigin
     *
     * @param \ApiBundle\Entity\MangaOrigin $mangaOrigin
     */
    public function removeMangaOrigin(\ApiBundle\Entity\MangaOrigin $mangaOrigin)
    {
        $this->mangaOrigins->removeElement($mangaOrigin);
    }

    /**
     * Get mangaOrigins
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMangaOrigins()
    {
        return $this->mangaOrigins;
    }
}
