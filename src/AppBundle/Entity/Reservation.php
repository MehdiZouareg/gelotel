<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reservation
 *
 * @ORM\Table(name="Reservation", indexes={@ORM\Index(name="FK_Reservation_id_Chambre", columns={"id_Chambre"}), @ORM\Index(name="FK_Reservation_id_Hotel", columns={"id_Hotel"})})
 * @ORM\Entity
 */
class Reservation
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
     * @var \DateTime
     *
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
     * @var \Hotel
     *
     * @ORM\ManyToOne(targetEntity="Hotel")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_Hotel", referencedColumnName="id")
     * })
     */
    private $idHotel;

    /**
     * @var \Chambre
     *
     * @ORM\ManyToOne(targetEntity="Chambre")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_Chambre", referencedColumnName="id")
     * })
     */
    private $idChambre;



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
     * Set datearr
     *
     * @param \DateTime $datearr
     *
     * @return Reservation
     */
    public function setDatearr($datearr)
    {
        $this->datearr = $datearr;

        return $this;
    }

    /**
     * Get datearr
     *
     * @return \DateTime
     */
    public function getDatearr()
    {
        return $this->datearr;
    }

    /**
     * Set datedep
     *
     * @param \DateTime $datedep
     *
     * @return Reservation
     */
    public function setDatedep($datedep)
    {
        $this->datedep = $datedep;

        return $this;
    }

    /**
     * Get datedep
     *
     * @return \DateTime
     */
    public function getDatedep()
    {
        return $this->datedep;
    }

    /**
     * Set idHotel
     *
     * @param \AppBundle\Entity\Hotel $idHotel
     *
     * @return Reservation
     */
    public function setIdHotel(\AppBundle\Entity\Hotel $idHotel = null)
    {
        $this->idHotel = $idHotel;

        return $this;
    }

    /**
     * Get idHotel
     *
     * @return \AppBundle\Entity\Hotel
     */
    public function getIdHotel()
    {
        return $this->idHotel;
    }

    /**
     * Set idChambre
     *
     * @param \AppBundle\Entity\Chambre $idChambre
     *
     * @return Reservation
     */
    public function setIdChambre(\AppBundle\Entity\Chambre $idChambre = null)
    {
        $this->idChambre = $idChambre;

        return $this;
    }

    /**
     * Get idChambre
     *
     * @return \AppBundle\Entity\Chambre
     */
    public function getIdChambre()
    {
        return $this->idChambre;
    }
}
