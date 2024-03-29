<?php

namespace App\Repository;

use App\Entity\PlanningType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PlanningType|null find($id, $lockMode = null, $lockVersion = null)
 * @method PlanningType|null findOneBy(array $criteria, array $orderBy = null)
 * @method PlanningType[]    findAll()
 * @method PlanningType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlanningTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PlanningType::class);
    }

    // /**
    //  * @return PlanningType[] Returns an array of PlanningType objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PlanningType
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
