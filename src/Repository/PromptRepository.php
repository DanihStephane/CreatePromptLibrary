<?php

namespace App\Repository;

use App\Entity\Prompt;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class PromptRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Prompt::class);
    }

    public function findByCategory(string $category)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.category = :category')
            ->setParameter('category', $category)
            ->orderBy('p.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function search(string $query)
    {
        return $this->createQueryBuilder('p')
            ->where('p.title LIKE :query')
            ->orWhere('p.content LIKE :query')
            ->setParameter('query', '%'.$query.'%')
            ->orderBy('p.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }
}