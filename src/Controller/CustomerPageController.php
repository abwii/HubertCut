<?php

namespace App\Controller;

use App\Form\RdvFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CustomerPageController extends AbstractController
{
    #[Route('/customer', name: 'app_customer_page')]
    public function index(): Response
    {
        $rdvForm = $this->createForm(RdvFormType::class);
        return $this->render('customer_page/index.html.twig', [
            'RdvForm' => $rdvForm->createView(),
        ]);
    }
}
