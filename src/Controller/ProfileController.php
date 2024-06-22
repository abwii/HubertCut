<?php

namespace App\Controller;

use App\Form\ChangeNameFormType;
use App\Form\ChangePhoneFormType;
use App\Form\ChangeEmailFormType;
use App\Form\ChangeCoordinatesFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class ProfileController extends AbstractController
{
    #[Route('/profile', name: 'app_profile')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();

        $nameForm = $this->createForm(ChangeNameFormType::class, $user);
        $phoneForm = $this->createForm(ChangePhoneFormType::class, $user);
        $emailForm = $this->createForm(ChangeEmailFormType::class, $user);
        $coordinatesForm = $this->createForm(ChangeCoordinatesFormType::class, $user);

        $nameForm->handleRequest($request);
        $phoneForm->handleRequest($request);
        $emailForm->handleRequest($request);
        $coordinatesForm->handleRequest($request);

        if ($nameForm->isSubmitted() && $nameForm->isValid()) {
            $entityManager->flush();
            return $this->redirectToRoute('app_profile');
        }

        if ($phoneForm->isSubmitted() && $phoneForm->isValid()) {
            $entityManager->flush();
            return $this->redirectToRoute('app_profile');
        }

        if ($emailForm->isSubmitted() && $emailForm->isValid()) {
            $entityManager->flush();
            return $this->redirectToRoute('app_profile');
        }

        if ($coordinatesForm->isSubmitted() && $coordinatesForm->isValid()) {
            $entityManager->flush();
            return $this->redirectToRoute('app_profile');
        }

        return $this->render('profile/index.html.twig', [
            'nameForm' => $nameForm->createView(),
            'phoneForm' => $phoneForm->createView(),
            'emailForm' => $emailForm->createView(),
            'coordinatesForm' => $coordinatesForm->createView(),
        ]);
    }

    #[Route('/delete-account', name: 'delete_account', methods: ['POST'])]
    public function deleteAccount(EntityManagerInterface $entityManager, TokenStorageInterface $tokenStorage): Response
    {
        $user = $this->getUser();

        $entityManager->remove($user);
        $entityManager->flush();

        $tokenStorage->setToken(null);

        return $this->redirectToRoute('app_main');
    }
}
