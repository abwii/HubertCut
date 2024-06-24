<?php

namespace App\Controller;

use App\Entity\Rdv;
use App\Entity\Cut;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RdvController extends AbstractController
{
    #[Route('/create-rdv', name: 'create_rdv', methods: ['POST'])]
    public function createRdv(Request $request, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();
        $cutterId = $request->request->get('cutter_id');
        $cutId = $request->request->get('cut_id');
        $locationType = $request->request->get('location_type');

        $cutter = $entityManager->getRepository(User::class)->find($cutterId);
        $cut = $entityManager->getRepository(Cut::class)->find($cutId);

        if (!$cutter || !$cut) {
            return new Response('Cutter or cut not found', Response::HTTP_BAD_REQUEST);
        }

        $rdv = new Rdv();
        $rdv->setRdvDate(new \DateTime());
        $rdv->setRdvStatus('rdv_created');
        $rdv->setRdvCut($cut);
        $rdv->setRdvUserId($user);
        $rdv->setRdvCutterId($cutter);

        if ($locationType === 'a_domicile') {
            $rdv->setRdvCoordinatesX($user->getCoordinatesX());
            $rdv->setRdvCoordinatesY($user->getCoordinatesY());
        } else {
            $rdv->setRdvCoordinatesX($cutter->getCoordinatesX());
            $rdv->setRdvCoordinatesY($cutter->getCoordinatesY());
        }

        $entityManager->persist($rdv);
        $entityManager->flush();

        return new Response('Rdv created successfully', Response::HTTP_CREATED);
    }
}
