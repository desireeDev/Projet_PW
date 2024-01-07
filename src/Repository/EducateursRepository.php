<?php

namespace App\Repository;

use App\Entity\Educateurs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Educateurs>
 *
 * @method Educateurs|null find($id, $lockMode = null, $lockVersion = null)
 * @method Educateurs|null findOneBy(array $criteria, array $orderBy = null)
 * @method Educateurs[]    findAll()
 * @method Educateurs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EducateursRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Educateurs::class);
    }

//    /**
//     * @return Educateurs[] Returns an array of Educateurs objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('e.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Educateurs
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
