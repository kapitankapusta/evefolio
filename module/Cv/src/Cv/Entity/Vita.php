<?php

namespace Cv\Entity;

use Doctrine\ORM\Mapping as ORM;
//http://www.doctrine-project.org/api/common/2.1/class-Doctrine.Common.Collections.ArrayCollection.html
// use Doctrine\Common\Collections\ArrayCollection as Collection;

/**
 * Vita
 *
 * @ORM\Table(name="vita")
 * @ORM\Entity
 */
class Vita
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", nullable=false)
     */
    private $title;

    /**
     * @var text
     *
     * @ORM\Column(name="descr", type="text", nullable=true)
     */
    private $desc;

    /**
     * @var decimal
     *
     * @ORM\Column(name="latitude", type="string", nullable=true)
     */
    private $latitude;

    /**
     * @var decimal
     *
     * @ORM\Column(name="longitude", type="string", nullable=true)
     */
    private $longitude;

    /**
     * @var datetime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     */
    private $date;

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
     * Get Title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set Title
     *
     * @param string $title
     *
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Add a timeline to the Vita.
     *
     * @param Timeline $timeline
     *
     * @return void
     */
    public function addTimeLine($timeline)
    {
        $this->timeLines[] = $timeline;
    }

    /**
     * Removes a timeline from the Vita.
     *
     * @param Timeline $timeline
     *
     * @return void
     */
    public function removeTimeLine($timeline)
    {
        $this->timeLines->remove($timeline);
    }

    /**
     * Get Title
     *
     * @return string 
     */
    public function getDesc()
    {
        return $this->desc;
    }

    /**
     * Set Title
     *
     * @param string $title
     *
     * @return void
     */
    public function setDec($desc)
    {
        $this->desc = $desc;
    }

     /**
     * Get lat
     *
     * @return decimal 
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set latitude
     *
     * @param string $latitude
     *
     * @return void
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * Get long
     *
     * @return string 
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set long
     *
     * @param string $longitude
     *
     * @return void
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    /**
     * Get Date
     *
     * @return datetime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set long
     *
     * @param dateTime $date
     *
     * @return void
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

     /**
     * Set Object
     *
     * @param array $data
     *
     * @return void
     */
    public function exchangeArray($data)
    {
        $date = new \DateTime($data['date']);
        $this->date = $date;
        $this->longitude = $data['long'];
        $this->latitude = $data['latitude'];
        $this->title = $data['title'];
        $this->desc = $data['desc'];
    }
}