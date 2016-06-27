<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Hotel
 *
 * @ORM\Table(name="Hotel")
 * @ORM\Entity
 */
class Hotel
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
     * @ORM\Column(name="nom", type="string", length=25, nullable=true)
     */
    private $nom;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbChambres", type="integer", nullable=true)
     */
    private $nbchambres;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=25, nullable=true)
     */
    private $ville;



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
     * Set nom
     *
     * @param string $nom
     *
     * @return Hotel
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set nbchambres
     *
     * @param integer $nbchambres
     *
     * @return Hotel
     */
    public function setNbchambres($nbchambres)
    {
        $this->nbchambres = $nbchambres;

        return $this;
    }

    /**
     * Get nbchambres
     *
     * @return integer
     */
    public function getNbchambres()
    {
        return $this->nbchambres;
    }

    /**
     * Set ville
     *
     * @param string $ville
     *
     * @return Hotel
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }
}
