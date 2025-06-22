<?php

namespace App\Controller;

use App\Entity\Review;
use App\Form\ReviewType;
use App\Repository\ReviewRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/review', name: self::PREFIX)]
class ReviewController extends AbstractController
{
    private const PREFIX = 'review_';

    public function __construct(
        private readonly EntityManagerInterface $entityManager,
        private readonly ReviewRepository $reviewRepository,
    ) {
    }

    #[Route('/list', name: 'list', methods: ['GET'])]
    public function listAction(): Response
    {
        $reviews = $this->reviewRepository->findAll();

        return $this->render('review/list.html.twig', [
            'reviews' => $reviews,
            'routePrefix' => self::PREFIX,
        ]);
    }

    #[Route('/new', name: 'new', methods: ['GET', 'POST'])]
    public function createAction(Request $request): Response
    {
        $review = new Review();

        $form = $this->createForm(ReviewType::class, $review);

        $form->handleRequest($request);

        if (!$form->isSubmitted() || !$form->isValid()) {
            return $this->render('review/form.html.twig', [
                'form' => $form,
                'entity' => $review,
                'listPath' => $this->generateUrl(self::PREFIX.'list'),
            ]);
        }

        $this->entityManager->persist($review);
        $this->entityManager->flush();

        $this->addFlash('success', 'Review added successfully!');

        return $this->redirectToRoute(self::PREFIX.'list');
    }

    #[Route('/view/{id}', name: 'view', methods: ['GET'])]
    public function viewAction(Review $review): Response
    {
        return $this->render('review/view.html.twig', [
            'review' => $review,
        ]);
    }
}
