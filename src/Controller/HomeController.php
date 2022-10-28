<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/app', name: 'home_')]
class HomeController extends AbstractController
{
    #[Route('/', name: 'init')]
    public function redirectAdmin(): Response
    {
        return $this->json(['status' => true]);
    }

}