<?php

namespace App\Repository;

use App\Entity\Animal;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Animal|null find($id, $lockMode = null, $lockVersion = null)
 * @method Animal|null findOneBy(array $criteria, array $orderBy = null)
 * @method Animal[]    findAll()
 * @method Animal[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnimalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Animal::class);
    }

    // /**
    //  * @return Animal[] Returns an array of Animal objects
    //  */
    
    public function findAllAnimals($order)
    {
       $qb = $this->createQueryBuilder("a")
                         //->andWhere("a.raza = :raza" )
                         //->setParameter("raza","Pastor Aleman")
                         ->orderBy("a.raza","desc")
                         ->getQuery();
       
       $resulset = $qb->execute();
       return $resulset;
       
    }
    

    /*
    public function findOneBySomeField($value): ?Usuario
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
