<?php

namespace Work\Entity;

use Doctrine\ORM\Mapping as ORM;
//http://www.doctrine-project.org/api/common/2.1/class-Doctrine.Common.Collections.ArrayCollection.html
use Doctrine\Common\Collections\ArrayCollection as Collection;
use Work\Entity\Ref;

/**
 * Vita
 *
 * @ORM\Table(name="technology")
 * @ORM\Entity
 */
class Techno
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
     * @var text
     *
     * @ORM\Column(name="imagefilename", type="text", nullable=true)
     */
    private $imageFileName;

    /**
     * @var string
     *
     * @ORM\Column(name="webpage", type="string", nullable=false)
     */
    private $webpage;

    /**
     * @ORM\ManyToMany(targetEntity="Work\Entity\Ref")
     * @ORM\JoinTable(name="techno_references",
     *      joinColumns={@ORM\JoinColumn(name="id_tech", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="id_ref", referencedColumnName="id", unique=true)}
     *      )
     **/
    private $references;

    public function __construct()
    {
        $this->references = new Collection();
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
    public function setDesc($desc)
    {
        $this->desc = $desc;
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
     * Get imageFileName
     *
     * @return string 
     */
    public function getImageFileName()
    {
        return $this->imageFileName;
    }

    /**
     * Set imageFileName
     *
     * @param string $imageFileName
     *
     * @return void
     */
    public function setImageFileName($imageFileName)
    {
        $this->imageFileName = $imageFileName;
    }

    public function addReference($reference)
    {
        $this->references->add($reference);
    }

    public function hasReference($reference)
    {
        return $this->reference->contains($reference);
    }

    public function getReferences()
    {
        return $this->references;
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
        $this->title = $data['title'];
        $this->desc = $data['desc'];
        $this->imageFileName = $data['imagefilename'];
        $this->webpage = $data['webpage'];
    }
}