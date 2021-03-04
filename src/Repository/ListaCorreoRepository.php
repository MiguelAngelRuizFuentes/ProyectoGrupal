<?php

namespace App\Repository;

use App\Entity\ListaCorreo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ListaCorreo|null find($id, $lockMode = null, $lockVersion = null)
 * @method ListaCorreo|null findOneBy(array $criteria, array $orderBy = null)
 * @method ListaCorreo[]    findAll()
 * @method ListaCorreo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ListaCorreoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ListaCorreo::class);
    }

    // /**
    //  * @return ListaCorreo[] Returns an array of ListaCorreo objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ListaCorreo
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
