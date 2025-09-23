<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
// use Symfony\Component\HttpFoundation\Response;
final class ServiceController extends AbstractController
{
    #[Route('/service', name: 'app_service')]
    public function index(): Response
    {
        return $this->render('service/index.html.twig', [
            'controller_name' => 'ServiceController',
        ]);
    }

    #[Route('/Show/{nn}',name:'')]
    public function ShowService($nn){
        // return new Response('<h1><i>Service:'.$nn.'</i></h1>');
        return $this->render('service/ShowService.html.twig',['n'=>$nn]);
    }
}
