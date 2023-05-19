<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class helloController{
    #[Route(
        path: '/'
    )]
    public function handleAction(): Response
    {
    return new Response('hello World');
    }
}
