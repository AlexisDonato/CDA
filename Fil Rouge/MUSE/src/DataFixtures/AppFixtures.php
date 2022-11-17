<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $c1 = new Category();
        $c1->setName("Livres");
        $c1->setParentCategory(null);
        $manager->persist($c1);

        $c11 = new Category();
        $c11->setName("Livres");
        $c11->setParentCategory(null);
        $manager->persist($c11);


        $manager->flush();
    }
}
