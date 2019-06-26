<?php


namespace App\Repository;

use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use App\Entity\ProductCart;


class ProductCartRepository extends ServiceEntityRepository
{

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ProductCart::class);
    }


    public function getStatus($id)
    {

        $qb = $this->createQueryBuilder('n')
            ->andWhere('n.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getResult();
        return $qb->execute();

    }

    public function setStatus($id)
    {

        $qb = $this->createQueryBuilder('n')
            ->andWhere('n.id = :id')
            ->setParameter('id', $id)
            ->set('n.status', 'true')
            ->getQuery();
        return $qb->execute();

    }

    public function removeProduct($id)
    {

        $qb = $this->createQueryBuilder('n')
            ->andWhere('n.id = :id')
            ->setParameter('id', $id)
            ->set('n.status', 'true')
            ->getQuery();
        return $qb->execute();
    }
}