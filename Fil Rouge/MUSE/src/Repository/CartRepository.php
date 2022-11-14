<?php

namespace App\Repository;

use App\Entity\Cart;
use App\Entity\User;
use App\Entity\OrderDetails;
use App\Entity\Product;
use App\Entity\Supplier;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Common\Collections\Collection;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @extends ServiceEntityRepository<Cart>
 *
 * @method Cart|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cart|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cart[]    findAll()
 * @method Cart[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CartRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cart::class);
    }

    public function add(Cart $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Cart $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return Cart[] Returns an array of Cart objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

    public function findOneByUser($client_id): ?Cart
    {
        return $this->createQueryBuilder('c')
        ->where('c.user = :val')
        ->andWhere('c.validated = 0')
        ->setParameter('val', $client_id)
        ->getQuery()
        ->getOneOrNullResult();
    }

    public function findAllByUser($client_id): ?array
    {
        return $this->createQueryBuilder('c')
        ->where('c.user = :val')
        ->andWhere('c.validated = 1')
        ->setParameter('val', $client_id)
        ->getQuery()
        ->getResult();
    }

    public function findAllUsers()
    {
        return $this->createQueryBuilder('c')
        ->join(User::class, 'u', 'WITH', 'c.user = u.id')
        ->where('c.validated = 1')
        ->getQuery()
        ->getResult();
    }

    // Revenues by date
    public function findOrdersByDate()
    {
        return $this->createQueryBuilder('c')
        ->select('c.orderDate, SUM(c.total) AS Total')
        ->where('c.validated = 1')
        ->groupBy('c.orderDate')
        ->getQuery()
        ->getResult();
    }

    // Sales by supplier
    public function findSalesBySupplier()
    {
        return $this->createQueryBuilder('c')
        ->select('s.name, SUM(c.total) AS Total')
        ->join(OrderDetails::class, 'o', 'WITH', 'o.cart = c.id')
        ->join(Product::class, 'p', 'WITH', 'p.id = o.product')
        ->join(Supplier::class, 's', 'WITH', 'p.supplier = s.id')
        ->where('c.validated = 1')
        ->groupBy('s.name')
        ->getQuery()
        ->getResult();
    }

    // Sales by product
    public function findSalesByProduct()
    {
        return $this->createQueryBuilder('c')
        ->select('p.name, SUM(c.total) AS Total')
        ->join(OrderDetails::class, 'o', 'WITH', 'o.cart = c.id')
        ->join(Product::class, 'p', 'WITH', 'p.id = o.product')
        ->where('c.validated = 1')
        ->groupBy('p.name')
        ->orderBy('Total', 'DESC')
        ->getQuery()
        ->getResult();
    }

    // Sales by product
    public function findSalesByUser()
    {
        return $this->createQueryBuilder('c')
        ->select('u.email, SUM(c.total) AS Total')
        ->join(User::class, 'u', 'WITH', 'u.id = c.user')
        ->where('c.validated = 1')
        ->groupBy('u.email')
        ->orderBy('Total', 'DESC')
        ->getQuery()
        ->getResult();
    }
}