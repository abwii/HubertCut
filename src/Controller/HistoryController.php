<?php

namespace App\Controller;

use App\Entity\Rdv;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HistoryController extends AbstractController
{
    #[Route('/history', name: 'app_history')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();
        $rdvs = $entityManager->getRepository(Rdv::class)->findBy(['rdvUser' => $user]);

        return $this->render('history/index.html.twig', [
            'controller_name' => 'HistoryController',
            'rdvs' => $rdvs,
        ]);
    }
}
