<?php

namespace AppBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
*/
class Utilisateur extends BaseUser
{
    /**
     * @var integer
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var string
     * @ORM\Column(name="nom", type="string", nullable=true)
     */
    private $nom;

    /**
     * @var string
     * @ORM\Column(name="prenom", type="string", nullable=true)
     */
    private $prenom;

    /**
     * @var string
     * @ORM\Column(name="tel", type="string", nullable=true)
     */
    private $tel;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Reservation", mappedBy="Utilisateur")
     */

    private $Reservations;

    public function __construct()
    {
        parent::__construct();
        $this->Reservations = new ArrayCollection();
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
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param string $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return string
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * @param string $tel
     */
    public function setTel($tel)
    {
        $this->tel = $tel;
    }

    /**
     * @return ArrayCollection
     */
    public function getReservations()
    {
        return $this->Reservations;
    }

    /**
     * @param ArrayCollection $Reservations
     */
    public function setReservations($Reservations)
    {
        $this->Reservations->clear();

        foreach($Reservations as $Reservation)
        {
            $this->AddReservation($Reservation);
        }
    }

    public function AddReservation(Reservation $Reservation)
    {
        $this->Reservations->add($Reservation);

        if($Reservation->getUtilisateur() !== $this)
        {
            $Reservation->setUtilisateur($this);
        }
    }

    public function RemoveReservation(Reservation $Reservation)
    {
        $this->Reservations->removeElement($Reservation);

        if($Reservation->getUtilisateur() === $this)
        {
            $Reservation->setUtilisateur(null);
        }
    }
}
