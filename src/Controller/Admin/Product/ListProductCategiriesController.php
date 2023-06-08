<?php

declare(strict_types = 1);

namespace App\Controller\Admin\Product;

use App\Entity\ProductCategory;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

#[AsController]
class ListProductCategiriesController
{

    public function __construct(private Environment $twig, private EntityManagerInterface $entityManager)
    {

    }

    #[Route(
        path: '/admin/product-categories',
        name: 'admin_product_category_list'
    )]
    public function __invoke(): Response
    {
        $repository = $this->entityManager->getRepository(ProductCategory::class);
        $categories = $repository->findBy([],['priority' => 'ASC']);

        $content = $this->twig->render(
            'Admin/Product/categoryList.html.twig',
            [
            'categories' => $categories
            ]);

        return new Response($content);
    }
}