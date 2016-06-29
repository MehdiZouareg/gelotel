<?php

namespace Perischool\CoreBundle\Repository;

/**
* ChambreRepository
*
* This class was generated by the Doctrine ORM. Add your own custom
* repository methods below.
*/
class ChambreRepository extends \Doctrine\ORM\EntityRepository
{
    public function liste()
    {
    $qb = $this->_em->createQueryBuilder()
    ->select('l')
    ->from($this->_entityName, 'l');

    return $qb
    ->getQuery()
    ->getResult();
    }

    public function listeOpti()
    {
    $qb = $this->_em->createQueryBuilder()
    ->select('l')
    ->from($this->_entityName, 'l');

    return $qb
    ->getQuery()
    ->getArrayResult();
    }

    public function listeDisponiblesByHotel($hotel, $date)
    {
        $qb = $this->_em->createQueryBuilder()
            ->select('c')
            ->from($this->_entityName, 'c')
            ->where('c.Hotel = :idHotel')
            ->setParameter('idHotel', $hotel)
            ->andWhere('c.disponible = true');


        return $qb->getQuery()
            ->getResult();
    }
}