<?php

namespace App\Controller;

use App\Entity\Family;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class FamilyController extends AbstractController
{
    #[Route('/family', name: 'app_family')]
    public function index(): Response
    {
        return $this->render('family/index.html.twig', [
            'controller_name' => 'FamilyController',
        ]);
    }

    #[Route('/family/{id}', name: 'family_show')]
    public function show(Family $family): Response
    {
        $characters = $family->getCharacters();
        return $this->render('character/index.html.twig', ["characters" => $characters]);
    }
}
