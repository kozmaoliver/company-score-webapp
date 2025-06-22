<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/', name: 'index', methods: ['GET'])]
final class IndexController extends AbstractController
{
    public function __invoke(): Response
    {
        return $this->redirectToRoute('review_list');
    }
}
