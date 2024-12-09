<?php

namespace App\Controller;

use App\Entity\Prompt;
use App\Form\PromptType;
use App\Repository\PromptRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/prompts')]
class PromptController extends AbstractController
{
    #[Route('/', name: 'prompt_index', methods: ['GET'])]
    public function index(PromptRepository $promptRepository): Response
    {
        return $this->render('prompt/index.html.twig', [
            'prompts' => $promptRepository->findBy([], ['createdAt' => 'DESC'])
        ]);
    }

    #[Route('/new', name: 'prompt_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $prompt = new Prompt();
        $form = $this->createForm(PromptType::class, $prompt);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($prompt);
            $entityManager->flush();

            $this->addFlash('success', 'Prompt created successfully!');
            return $this->redirectToRoute('prompt_index');
        }

        return $this->render('prompt/new.html.twig', [
            'prompt' => $prompt,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'prompt_show', methods: ['GET'])]
    public function show(Prompt $prompt): Response
    {
        return $this->render('prompt/show.html.twig', [
            'prompt' => $prompt
        ]);
    }

    #[Route('/{id}/edit', name: 'prompt_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Prompt $prompt, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PromptType::class, $prompt);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $prompt->setUpdatedAt(new \DateTimeImmutable());
            $entityManager->flush();

            $this->addFlash('success', 'Prompt updated successfully!');
            return $this->redirectToRoute('prompt_index');
        }

        return $this->render('prompt/edit.html.twig', [
            'prompt' => $prompt,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'prompt_delete', methods: ['POST'])]
    public function delete(Request $request, Prompt $prompt, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$prompt->getId(), $request->request->get('_token'))) {
            $entityManager->remove($prompt);
            $entityManager->flush();
            $this->addFlash('success', 'Prompt deleted successfully!');
        }

        return $this->redirectToRoute('prompt_index');
    }
}