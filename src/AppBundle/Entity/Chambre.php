<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Chambre
{
    /**
     * @var integer
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var boolean
     * @ORM\Column(name="disponible", type="boolean", nullable=true)
     */
    private $disponible;

    /**
     * @var string
     * @ORM\Column(name="type", type="string", length=25, nullable=true)
     */
    private $type;

    /**
     * @var Hotel
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Hotel", inversedBy="Chambres")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Hotel;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Options", inversedBy="Chambres")
     */
    private $Options;

    public function __construct()
    {
        $this->Options = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return ArrayCollection
     */
    public function getOptions()
    {
        return $this->Options;
    }

    /**
     * @param ArrayCollection $Options
     */
    public function setOptions($Options)
    {
        $this->Options->clear();

        foreach($Options as $Option)
        {
            $this->AddOption($Option);
        }
    }

    public function AddOption(Options $Option)
    {
        $this->Options->add($Option);

        if(!$Option->getChambres()->contains($this)){
            $Option->AddChambre($this);
        }
    }

    public function RemoveOption(Options $Option)
    {
        $this->Options->RemoveElement($Option);

        if ($Option->getChambres()->contains($this))
        {
            $Option->AddChambre($this);
        }

    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return boolean
     */
    public function isDisponible()
    {
        return $this->disponible;
    }

    /**
     * @param boolean $disponible
     */
    public function setDisponible($disponible)
    {
        $this->disponible = $disponible;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return Hotel
     */
    public function getHotel()
    {
        return $this->Hotel;
    }

    /**
     * @param Hotel $Hotel
     */
    public function setHotel(Hotel $Hotel)
    {
        $this->Hotel = $Hotel;
    }


}
