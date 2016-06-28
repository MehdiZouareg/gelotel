<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Options
 *
 * @ORM\Table(name="Options")
 * @ORM\Entity
 */
class Options
{
    /**
     * @var integer
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="intitule", type="string", length=25, nullable=true)
     */
    private $intitule;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Chambre", mappedBy="Options")
     */
    private $Chambres;

    public function __construct()
    {
        $this->Chambres = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getIntitule()
    {
        return $this->intitule;
    }

    /**
     * @param string $intitule
     */
    public function setIntitule($intitule)
    {
        $this->intitule = $intitule;
    }

    /**
     * @return ArrayCollection
     */
    public function getChambres()
    {
        return $this->Chambres;
    }

    /**
     * @param ArrayCollection $Chambres
     */
    public function setChambres($Chambres)
    {
        $this->Chambres->clear();

        foreach($Chambres as $Chambre)
        {
            $this->AddChambre($Chambre);
        }

    }

    public function AddChambre(Chambre $Chambre)
    {
        $this->Chambres->add($Chambre);

        if (!$Chambre->getOptions()->contains($this))
        {
            $Chambre->AddOption($this);
        }
    }

    public function RemoveChambre(Chambre $Chambre)
    {
        $this->Chambres->removeElement($Chambre);

        if ($Chambre->getOptions()->contains($this))
        {
            $Chambre->RemoveOption($this);
        }
    }

}
