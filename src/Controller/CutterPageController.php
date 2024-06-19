<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class CutterPageController extends AbstractController
{
    #[Route('/cutter', name: 'app_cutter_page')]
    public function index(): Response
    {
        $user = $this->getUser();

        return $this->render('cutter_page/index.html.twig', [
            'controller_name' => 'CutterPageController',
            'user' => $user,
            'cutter_status' => $user->getCutterStatus(),
        ]);
    }

    #[Route('/update-cutter-description', name: 'update_cutter_description', methods: ['POST'])]
    public function updateCutterDescription(Request $request, EntityManagerInterface $em, UserInterface $user): Response
    {
        $description = $request->request->get('cutterdescription');
        if ($description !== null) {
            $user->setCutterDescription($description);
            $em->persist($user);
            $em->flush();
        }

        return $this->redirectToRoute('app_cutter_page');
    }

    #[Route('/update-cutter-status', name: 'update_cutter_status', methods: ['POST'])]
    public function updateCutterStatus(EntityManagerInterface $em, UserInterface $user): Response
    {
        $currentStatus = $user->getCutterStatus();
        $newStatus = $currentStatus === 'LFC' ? 'IDLE' : 'LFC';
        $user->setCutterStatus($newStatus);
        $em->persist($user);
        $em->flush();

        return new Response('Status updated to ' . $newStatus);
    }
}
