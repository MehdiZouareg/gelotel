<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Hotel
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
     * @ORM\Column(name="nom", type="string", length=25, nullable=true)
     */
    private $nom;

    /**
     * @var string
     * @ORM\Column(name="ville", type="string", length=25, nullable=true)
     */
    private $ville;

    public function __construct()
    {
        $this->Chambres = new ArrayCollection();
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

        foreach ($Chambres as $Chambre)
        {
            $this->AddChambre($Chambre);
        }
    }

    public function AddChambre(Chambre $Chambre)
    {
        $this->Chambres->add($Chambre);

        if($Chambre->getHotel() !== $this)
        {
            $Chambre->setHotel($this);
        }

    }

    public function RemoveChambre(Chambre $Chambre)
    {
        $this->Chambres->removeElement($Chambre);

        if($Chambre->getHotel() === $this)
        {
            $Chambre->setHotel(null);
        }

    }


    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Chambre", mappedBy="Hotel")
     */
    private $Chambres;

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
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }


    /**
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @param string $ville
     */
    public function setVille($ville)
    {
        $this->ville = $ville;
    }

}
