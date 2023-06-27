<?php

declare(strict_types = 1);

namespace App\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\Table;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;


#[Entity]
#[Table(name: 'products')]
class Product
{
    #[Id]
    #[GeneratedValue(strategy: 'AUTO')]
    #[Column(name: 'id', type: 'integer')]
    private int $id;

    #[ManyToOne(targetEntity: ProductCategory::class)]
    #[JoinColumn(name: 'category_id',referencedColumnName: 'id',nullable: false,onDelete: 'RESTRICT')]
    private ProductCategory $category;


    #[Column(name: 'title', type: 'string',length: 100)]
    #[NotBlank]
    #[Length(max: 100)]
    private string $title;

    #[Column(name: 'sub_title', type: 'string',length: 1000)]
    #[NotBlank]
    #[Length(max: 100)]
    private string $subTitle;

    #[Column(name: 'price', type: 'float',precision: 15,scale: 2)]
    #[NotBlank]
    private float $price;

    #[Column(name:'ingredient', type: 'string')]
    #[NotBlank]
    #[Length(max: 1000)]
    private string $ingredient;


    #[Column(name:'weight',type: 'integer')]
    private int $weight;

    #[Column(name: 'calories',type: 'integer',nullable: true)]
    private ?int $calories = 0;


    #[Column(name: 'priority',type: 'integer',nullable: true)]
    private int  $priority = 0;


    public function getId(): int
    {
        return $this->id;
    }


    public function getCategory(): ProductCategory
    {
        return $this->category;
    }


    public function getTitle(): string
    {
        return $this->title;
    }


    public function getSubTitle(): string
    {
        return $this->subTitle;
    }


    public function getPrice(): float
    {
        return $this->price;
    }


    public function getIngredient(): string
    {
        return $this->ingredient;
    }


    public function getWeight(): int
    {
        return $this->weight;
    }


    public function getCalories(): ?int
    {
        return $this->calories;
    }


    public function getPriority(): int
    {
        return $this->priority;
    }


    public function setCategory(ProductCategory $category): void
    {
        $this->category = $category;
    }


    public function setTitle(string $title): void
    {
        $this->title = $title;
    }


    public function setSubTitle(string $subTitle): void
    {
        $this->subTitle = $subTitle;
    }


    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function setWeight(int $weight): void
    {
        $this->weight = $weight;
    }

    public function setCalories(?int $calories): void
    {
        $this->calories = $calories;
    }

    public function setIngredient(string $ingredient): void
    {
        $this->ingredient = $ingredient;
    }

    public function setPriority(int $priority): void
    {
        $this->priority = $priority;
    }
}