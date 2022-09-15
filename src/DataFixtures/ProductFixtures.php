<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Product;

class ProductFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $milk = (new Product())
            ->setTitle('Milk')
            ->setPrice('1.99')
            ->setDescription('An emulsion of fat and protein in water');
        $manager->persist($milk);

        $bread = (new Product())
            ->setTitle('Bread')
            ->setPrice('2.15')
            ->setDescription('Food made of flour, water, and yeast mixed together and baked');
        $manager->persist($bread);

        $flour = (new Product())
            ->setTitle('Flour')
            ->setPrice('0.99')
            ->setDescription('A powder made by grinding raw grains');
        $manager->persist($flour);

        $manager->flush();
    }
}
