<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

class HomepageController extends AbstractController
{

    public function __construct(private Security $security){}

    #[Route('/homepage', name: 'app_homepage')]
    public function index(): Response
    {
        $user = $this->security->getUser();
        return $this->render('homepage/index.html.twig', [
            'user' => $user,
        ]);
    }
}
