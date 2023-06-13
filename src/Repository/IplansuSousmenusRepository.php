<?php

namespace App\Repository;

use App\Entity\IplansuSousmenus;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<IplansuSousmenus>
 *
 * @method IplansuSousmenus|null find($id, $lockMode = null, $lockVersion = null)
 * @method IplansuSousmenus|null findOneBy(array $criteria, array $orderBy = null)
 * @method IplansuSousmenus[]    findAll()
 * @method IplansuSousmenus[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IplansuSousmenusRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, IplansuSousmenus::class);
    }

    public function save(IplansuSousmenus $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(IplansuSousmenus $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return IplansuSousmenus[] Returns an array of IplansuSousmenus objects
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

//    public function findOneBySomeField($value): ?IplansuSousmenus
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
