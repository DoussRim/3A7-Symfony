<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
#[Route('/Author')]
final class AuthorController extends AbstractController
{
    #[Route('/author', name: 'app_author')]
    public function index(): Response
    {
        return $this->render('author/index.html.twig', [
            'controller_name' => 'AuthorController',
        ]);
    }
    #[Route('/show/{name}',name:'aa',defaults:['name'=>"Emna"])]
    function showAuthor($name){
        return $this->render('author/show.html.twig',
    ['nn'=>$name]);

    }
    #[Route('/Liste')]
    function ListeAuthor(){
        $authors = array(
        array('id' => 1, 'picture' => '/images/esprit.png','username' => 'Victor Hugo', 'email' => 'victor.hugo@gmail.com ', 'nb_books' => 100),
        array('id' => 2, 'picture' => '/images/esprit.png','username' => ' William Shakespeare', 'email' =>  ' william.shakespeare@gmail.com', 'nb_books' => 200 ),
        array('id' => 3, 'picture' => '/images/esprit.png','username' => 'Taha Hussein', 'email' => 'taha.hussein@gmail.com', 'nb_books' => 300),
    );
        return $this->render('author/liste.html.twig',
    ['auth'=>$authors]);
    }
}
