<?php

namespace App\Repository;

use App\Entity\Educateur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Educateur>
 *
 * @method Educateur|null find($id, $lockMode = null, $lockVersion = null)
 * @method Educateur|null findOneBy(array $criteria, array $orderBy = null)
 * @method Educateur[]    findAll()
 * @method Educateur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EducateurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Educateur::class);
    }

//    /**
//     * @return Educateur[] Returns an array of Educateur objects
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

//    public function findOneBySomeField($value): ?Educateur
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
