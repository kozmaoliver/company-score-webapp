<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/', name: 'index', methods: ['GET'])]
class IndexController extends AbstractController
{
    public function __invoke(): Response
    {
        return $this->render('dashboard/index.html.twig');
    }
}
