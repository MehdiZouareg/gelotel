<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Propose
 *
 * @ORM\Table(name="propose", indexes={@ORM\Index(name="FK_propose_id_Chambre", columns={"id_Chambre"}), @ORM\Index(name="FK_propose_id_Hotel", columns={"id_Hotel"}), @ORM\Index(name="IDX_3DF2D060BF396750", columns={"id"})})
 * @ORM\Entity
 */
class Propose
{
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
     * @var \Options
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Options")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id", referencedColumnName="id")
     * })
     */
    private $id;

    /**
     * @var \Chambre
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Chambre")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_Chambre", referencedColumnName="id")
     * })
     */
    private $idChambre;



    /**
     * Set idHotel
     *
     * @param \AppBundle\Entity\Hotel $idHotel
     *
     * @return Propose
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

    /**
     * Set id
     *
     * @param \AppBundle\Entity\Options $id
     *
     * @return Propose
     */
    public function setId(\AppBundle\Entity\Options $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return \AppBundle\Entity\Options
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set idChambre
     *
     * @param \AppBundle\Entity\Chambre $idChambre
     *
     * @return Propose
     */
    public function setIdChambre(\AppBundle\Entity\Chambre $idChambre)
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
