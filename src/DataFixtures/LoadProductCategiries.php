<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\ProductCategory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class LoadProductCategiries extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $categories = [
            'child_menu' => 'Child menu',
            'salad'      => 'salad',
            'soup'       => 'soup',
            'pizza'      => 'pizza',
            'snacks'     => 'snacks',
            'meat'       => 'meat',
            'beer'       => 'beer',
        ];

        $priority = 0;

        foreach ($categories as $key => $title) {

            $category = new ProductCategory();
            $category->setTitle($title);
            $category->setPriority($priority);
            $priority ++;

            $this->setReference('product_category:'.$key,$category);

            $manager->persist($category);


        }

        $manager->flush();
    }

}