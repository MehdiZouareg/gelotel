<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\DateTime;


/**
 * @ORM\Entity
 */
class Reservation
{
    /**
     * @var integer
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     * @ORM\Column(name="dateArr", type="date", nullable=true)
     */
    private $datearr;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDep", type="date", nullable=true)
     */
    private $datedep;

    /**
     * @var Hotel
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Hotel")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Hotel;

    /**
     * @var Chambre
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Chambre")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Chambre;

    /**
     * @var Utilisateur
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Utilisateur")
     */
    private $Utilisateur;

    public function __construct()
    {
        $this->datearr = new \DateTime();
        $this->datedep = new \DateTime();
    }

    /**
     * @return Utilisateur
     */
    public function getUtilisateur()
    {
        return $this->Utilisateur;
    }

    /**
     * @param Utilisateur $Utilisateur
     */
    public function setUtilisateur($Utilisateur)
    {
        $this->Utilisateur = $Utilisateur;
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
     * @return \DateTime
     */
    public function getDatearr()
    {
        return $this->datearr;
    }

    /**
     * @param \DateTime $datearr
     */
    public function setDatearr($datearr)
    {
        $this->datearr = $datearr;
    }

    /**
     * @return \DateTime
     */
    public function getDatedep()
    {
        return $this->datedep;
    }

    /**
     * @param \DateTime $datedep
     */
    public function setDatedep($datedep)
    {
        $this->datedep = $datedep;
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

    /**
     * @return Chambre
     */
    public function getChambre()
    {
        return $this->Chambre;
    }

    /**
     * @param Chambre $Chambre
     */
    public function setChambre(Chambre $Chambre)
    {
        $this->Chambre = $Chambre;
    }



}
