<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Chambre
 *
 * @ORM\Table(name="Chambre", indexes={@ORM\Index(name="FK_Chambre_id_Hotel", columns={"id_Hotel"}), @ORM\Index(name="FK_Chambre_id_Reservation", columns={"id_Reservation"})})
 * @ORM\Entity
 */
class Chambre
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $id;

    /**
     * @var boolean
     *
     * @ORM\Column(name="disponible", type="boolean", nullable=true)
     */
    private $disponible;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=25, nullable=true)
     */
    private $type;

    /**
     * @var \Reservation
     *
     * @ORM\ManyToOne(targetEntity="Reservation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_Reservation", referencedColumnName="id")
     * })
     */
    private $idReservation;

    /**
     * @var \Hotel
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Hotel")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_Hotel", referencedColumnName="id")
     * })
     */
    private $idHotel;



    /**
     * Set id
     *
     * @param integer $id
     *
     * @return Chambre
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
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
     * Set disponible
     *
     * @param boolean $disponible
     *
     * @return Chambre
     */
    public function setDisponible($disponible)
    {
        $this->disponible = $disponible;

        return $this;
    }

    /**
     * Get disponible
     *
     * @return boolean
     */
    public function getDisponible()
    {
        return $this->disponible;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Chambre
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set idReservation
     *
     * @param \AppBundle\Entity\Reservation $idReservation
     *
     * @return Chambre
     */
    public function setIdReservation(\AppBundle\Entity\Reservation $idReservation = null)
    {
        $this->idReservation = $idReservation;

        return $this;
    }

    /**
     * Get idReservation
     *
     * @return \AppBundle\Entity\Reservation
     */
    public function getIdReservation()
    {
        return $this->idReservation;
    }

    /**
     * Set idHotel
     *
     * @param \AppBundle\Entity\Hotel $idHotel
     *
     * @return Chambre
     */
    public function setIdHotel(\AppBundle\Entity\Hotel $idHotel)
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
}
