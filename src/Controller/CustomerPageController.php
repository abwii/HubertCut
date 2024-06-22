<?php

namespace App\Controller;

use App\Form\RdvFormType;
use App\Repository\CutRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class CustomerPageController extends AbstractController
{
    #[Route('/customer', name: 'app_customer_page')]
    public function index(Request $request, CutRepository $cutRepository): Response
    {
        $cuts = $cutRepository->findAll();
        $cutChoices = [];
        foreach ($cuts as $cut) {
            $cutChoices[$cut->getCutName()] = $cut->getId();
        }

        $rdvForm = $this->createForm(RdvFormType::class, null, ['cut_choices' => $cutChoices]);

        return $this->render('customer_page/index.html.twig', [
            'RdvForm' => $rdvForm->createView(),
        ]);
    }
}
