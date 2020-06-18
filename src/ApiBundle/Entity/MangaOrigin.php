<?php

namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use JMS\Serializer\Annotation as JMS;

/**
 * @ORM\Entity
 * @ORM\Table(name="Manga_Origin")
 */
class MangaOrigin 
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
     * @var date
     *
     * @ORM\Column(name="date_last_updated", type="datetime", nullable=true)
     *
     * @JMS\Expose
     * @JMS\Groups({"mini"})
     */
    protected $dateLastUpdated;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Manga", inversedBy="mangaOrigins" ,cascade={"persist"})
     * @ORM\JoinColumn(name="manga_id", referencedColumnName="id")
     *
     * @JMS\Expose
     * @JMS\Groups({"mini"})
     */
    private $manga;



    /**
     * @var string
     *
     * @ORM\Column(name="origin", type="string", nullable=true)
     *
     * @JMS\Expose
     * @JMS\Groups({"mini"})
     */
    protected $origin;

    /**
     * @var string
     *
     * @ORM\Column(name="origin_id", type="string", nullable=true)
     *
     * @JMS\Expose
     * @JMS\Groups({"mini"})
     */
    protected $originId;

    public function __construct()
    {
        parent::__construct();
        // your own logic
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
     * @return MangaOrigin
     */
    public function setDateLastUpdated($dateLastUpdated)
    {
        $this->dateLastUpdated = $dateLastUpdated;

        return $this;
    }

    /**
     * Get dateLastUpdated
     *
     * @return \DateTime
     */
    public function getDateLastUpdated()
    {
        return $this->dateLastUpdated;
    }

    /**
     * Set origin
     *
     * @param string $origin
     *
     * @return MangaOrigin
     */
    public function setOrigin($origin)
    {
        $this->origin = $origin;

        return $this;
    }

    /**
     * Get origin
     *
     * @return string
     */
    public function getOrigin()
    {
        return $this->origin;
    }

    /**
     * Set originId
     *
     * @param string $originId
     *
     * @return MangaOrigin
     */
    public function setOriginId($originId)
    {
        $this->originId = $originId;

        return $this;
    }

    /**
     * Get originId
     *
     * @return string
     */
    public function getOriginId()
    {
        return $this->originId;
    }

    /**
     * Set manga
     *
     * @param \ApiBundle\Entity\Manga $manga
     *
     * @return MangaOrigin
     */
    public function setManga(\ApiBundle\Entity\Manga $manga = null)
    {
        $this->manga = $manga;

        return $this;
    }

    /**
     * Get manga
     *
     * @return \ApiBundle\Entity\Manga
     */
    public function getManga()
    {
        return $this->manga;
    }
}
