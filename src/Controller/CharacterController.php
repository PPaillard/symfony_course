<?php

namespace App\Controller;

use App\Entity\Character;
use App\Repository\CharacterRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CharacterController extends AbstractController
{
    #[Route('/characters', name: 'character_index')]
    public function index(CharacterRepository $characterRepository): Response
    {
        $characters = $characterRepository->findAll();

        return $this->render('character/index.html.twig', ["characters" => $characters]);
    }
}
