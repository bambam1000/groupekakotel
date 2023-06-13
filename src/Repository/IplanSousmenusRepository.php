<?php

namespace App\Repository;

use App\Entity\IplanSousmenus;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<IplanSousmenus>
 *
 * @method IplanSousmenus|null find($id, $lockMode = null, $lockVersion = null)
 * @method IplanSousmenus|null findOneBy(array $criteria, array $orderBy = null)
 * @method IplanSousmenus[]    findAll()
 * @method IplanSousmenus[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IplanSousmenusRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, IplanSousmenus::class);
    }

    public function save(IplanSousmenus $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(IplanSousmenus $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return IplanSousmenus[] Returns an array of IplanSousmenus objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('i.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?IplanSousmenus
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
