<?php

namespace App\Controller;

use App\DataFixtures\AppFixtures;
use App\Entity\Product;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class helloController{
    #[Route(
        path: '/'
    )]
    public function handleAction(): Response
    {


    return new Response('hello');
    }
}
