<?php

// src/Repository/IngredientRepository.php
namespace App\Repository;

use App\Entity\Ingredient;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class IngredientRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Ingredient::class);
    }

    public function findAllNameOfGroupNameMatch($word) : array
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager
            ->createQuery(
                'SELECT i.code AS id, i.name AS name
                FROM App\Entity\Ingredient i
                WHERE (i.name LIKE :word OR i.grpNameFr LIKE :word)
                ORDER BY i.name ASC'
            )
            ->setParameter('word', '%' . $word . '%');

        return $query->getResult();
    }
}
