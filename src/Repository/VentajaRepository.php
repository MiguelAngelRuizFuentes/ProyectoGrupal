<?php

namespace App\Repository;

use App\Entity\Ventaja;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Ventaja|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ventaja|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ventaja[]    findAll()
 * @method Ventaja[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VentajaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ventaja::class);
    }

    // /**
    //  * @return Ventaja[] Returns an array of Ventaja objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Ventaja
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
