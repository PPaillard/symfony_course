<?php

namespace App\Controller;

use App\Entity\Character;
use App\Form\CharacterType;
use App\Repository\CharacterRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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

    #[Route('/new', name: 'app_character_new')]
    public function new(
        Request $request,
        CharacterRepository $characterRepository
    ): Response {
        $character = new Character();
        $form = $this->createForm(CharacterType::class, $character);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $characterRepository->save($character, true);

            return $this->redirectToRoute('character_index');
        }

        return $this->render('character/new.html.twig', [
            'character' => $character,
            'form' => $form,
        ]);
    }
}
