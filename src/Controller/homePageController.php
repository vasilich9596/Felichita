<?php
declare(strict_types=1);
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Annotation\Route;

#[AsController]
class homePageController
{
    #[Route(
        path: '/',
        name: 'home_page'
    )]
    public function __invoke(): Response
    {
        return new Response('<html><head></head><body>hallo home page</body></html>');
    }

}
