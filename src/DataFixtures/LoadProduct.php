<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class LoadProduct extends Fixture implements DependentFixtureInterface
{
    public function getDependencies(): array
    {
        return[
            LoadProductCategiries::class,
        ];
    }

    public function load(ObjectManager $manager)
    {
        $products = [
            [
                'category'   => 'child_menu',
                'title'      => 'burger',
                'sub_title'  => 'kids burger',
                'ingredient' => 'bread, tomato, parmisian, beef',
                'price'      => 300.,
                'weight'     => 239,
                'calories'   => 436,
            ],
            [
                'category'   => 'child_menu',
                'title'      => 'gold fries',
                'sub_title'  => 'potato fries',
                'ingredient' => 'potato, salt',
                'price'      => 100.,
                'weight'     => 150,
                'calories'   => 1150,
            ],
            [
                'category'   => 'child_menu',
                'title'      => 'nugets',
                'sub_title'  => 'chicken nugets',
                'ingredient' => 'chicken, egg',
                'price'      => 120.,
                'weight'     => 100,
                'calories'   => 566,
            ],
            [
            'category'   => 'salad',
            'title'      => 'cezar',
            'sub_title'  => 'tasty cezar',
            'ingredient' => 'tomato,bread, olivas',
            'price'      => 70.,
            'weight'     => 150,
            'calories'   => 300,

            ],
            [
                'category'   => 'salad',
                'title'      => 'grecki',
                'sub_title'  => 'from my friend stepan',
                'ingredient' => 'chicken,salad, sous',
                'price'      => 88.,
                'weight'     => 150,
                'calories'   => 269,
            ],
            [
                'category'   => 'soup',
                'title'      => 'borsch',
                'sub_title'  => 'Ukraine borsch',
                'ingredient' => 'potato, meat, onion,carrot, beet',
                'price'      => 50.,
                'weight'     => 259,
                'calories'   => 500,
            ],
            [
                'category'   => 'soup',
                'title'      => 'borsch',
                'sub_title'  => 'green borsch',
                'ingredient' => 'potato, meat,onion,sorrel',
                'price'      => 60.,
                'weight'     => 300,
                'calories'   => 500,
            ],
            [
                'category'   => 'beer',
                'title'      => 'zeman',
                'sub_title'  => 'traditional',
                'ingredient' => 'hop,malt',
                'price'      => 40.,
                'weight'     => 1,
                'calories'   => null,
            ],
            [
                'category'   => 'beer',
                'title'      => 'pavlivske',
                'sub_title'  => '',
                'ingredient' => 'hop,malt',
                'price'      => 40.,
                'weight'     => 1,
                'calories'   => null,
            ],
            [
                'category'   => 'pizza',
                'title'      => 'italiano',
                'sub_title'  => '',
                'ingredient' => 'souse,cheese,pasta',
                'price'      => 120.,
                'weight'     => 320,
                'calories'   => 540,
            ]
        ];

        foreach ($products as $item){
            $product = new Product();
            $category = $this->getReference('product_category:'.$item['category']);

            $product->setCategory($category);
            $product->setTitle($item['title']);
            $product->setSubTitle($item['sub_title']);
            $product->setIngredient($item['ingredient']);
            $product->setPrice($item['price']);
            $product->setWeight($item['weight']);
            $product->setCalories($item['calories']);

            $manager->persist($product);
        }

        $manager->flush();
    }
}