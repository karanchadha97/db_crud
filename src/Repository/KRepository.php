<?php

namespace App\Repository;

use App\Entity\K;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method K|null find($id, $lockMode = null, $lockVersion = null)
 * @method K|null findOneBy(array $criteria, array $orderBy = null)
 * @method K[]    findAll()
 * @method K[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, K::class);
    }

    // /**
    //  * @return K[] Returns an array of K objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('k.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?K
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
