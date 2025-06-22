<?php

namespace App\Repository;

use App\Entity\Review;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

final class ReviewRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Review::class);
    }

    public function findList(?string $search): array
    {
        $queryBuilder = $this->createQueryBuilder('r');

        if (null !== $search) {
            $queryBuilder->andWhere('r.companyName like :query')
                ->setParameter('query', '%' . addcslashes($search, '%_') . '%');
        }

        $queryBuilder->addOrderBy('r.createdAt', 'DESC');

        return $queryBuilder->getQuery()->getResult();
    }
}
