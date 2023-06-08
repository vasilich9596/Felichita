<?php

declare(strict_types=1);

namespace App\Controller\Admin\Product;

use App\Form\Type\ProductCategoryType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

#[AsController]
class AddProductCategoryController
{
    public function __construct(
        private Environment            $twig,
        private FormFactoryInterface   $formFactory,
        private EntityManagerInterface $entityManager,
        private UrlGeneratorInterface $urlGenerator


    )
    {

    }

    #[Route(
        path: '/admin/product-categories/create',
        name: 'admin_product_categories_create'
    )]
    public function __invoke(Request $request): Response
    {
        $form = $this->formFactory->create(ProductCategoryType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $category = $form->getData();

            $this->entityManager->persist($category);
            $this->entityManager->flush();

            $regirectUrl =$this->urlGenerator->generate('admin_product_category_list');

            /** Session $session */
            $session = $request->getSession();

            $session->getFlashBag()->add('success', "successfully create new product category");

            return new RedirectResponse($regirectUrl);
        }

        $content = $this->twig->render('Admin/Product/categoryCreate.html.twig',
            [
                'category_form' => $form->createView()
            ]);

        return new Response($content);
    }
}