<?php

namespace App\DataFixtures;

use App\Entity\Product;
use App\Entity\Category;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 10; $i++) {
            $category = new Category();
            $category->setName('product ' . $i);
            $category->setParentCategory($category);
            $manager->persist($category);
        }


        for ($i = 0; $i < 20; $i++) {
            $product = new Product();
            $product->setName('product ' . $i);
            $product->setCategory(mt_rand(0, 9));
            $manager->persist($product);
        }

        // $c1 = new Category();
        // $c1->setName("Livres");
        // $c1->setParentCategory(null);
        // $manager->persist($c1);

        // $c11 = new Category();
        // $c11->setName("Motos");
        // $c11->setParentCategory($c1->getId());
        // $manager->persist($c11);

        // $p1 = new Product();
        // $p1->setName("Bicyclette");
        // $p1->setCategory($c11->getId());
        // $manager->persist($p1);


        // $p1 = new Product();
        // $p1->setName("Bicyclette2");
        // $p1->setCategory($c11->getId());
        // $manager->persist($p1);

        $manager->flush();
    }
}
