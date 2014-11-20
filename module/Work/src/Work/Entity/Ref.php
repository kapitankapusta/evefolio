<?php

namespace Work\Entity;

use Doctrine\ORM\Mapping as ORM;
//http://www.doctrine-project.org/api/common/2.1/class-Doctrine.Common.Collections.ArrayCollection.html
use Doctrine\Common\Collections\ArrayCollection as Collection;

/**
 * Vita
 *
 * @ORM\Table(name="reference")
 * @ORM\Entity
 */
class Ref
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
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $desc;

    /**
     * @var string
     *
     * @ORM\Column(name="webpage", type="string", nullable=false)
     */
    private $webpage;

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
     * Get Date
     *
     * @return string 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set date
     *
     * @param string date
     *
     * @return void
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * Get Webpage
     *
     * @return string 
     */
    public function getWebpage()
    {
        return $this->webpage;
    }

    /**
     * Set webpage
     *
     * @param string $webpage
     *
     * @return void
     */
    public function setWebpage($webpage)
    {
        $this->webpage = $webpage;
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
        $this->title = $data['title'];
        $this->desc = $data['desc'];
        $this->webpage = $data['webpage'];
    }
}