<?php

namespace App\Controller;

use App\Repository\BookRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Book;
use App\Form\BookType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

final class BooksController extends AbstractController
{
    #[Route('/books', name: 'app_books')]
    public function index(): Response
    {
        return $this->render('books/index.html.twig', [
            'controller_name' => 'BooksController',
        ]);
    }
    #[Route('/Affiche',name:"AF")]
    function Affiche(BookRepository $repo){
        $books=$repo->findAll();
        return $this->render("books/Affiche.html.twig",
        ['b'=>$books]);
    }
    #[Route('/details/{id}',name:"Det")]
    function Dteails($id,BookRepository $repo){
        $book=$repo->find($id);
        return $this->render("books/Details.html.twig",
        ['b'=>$book]);
    }
     #[Route('/Update/{id}',name:"Up")]
    function Update(Book $book,BookRepository $repo,Request $request,EntityManagerInterface $entityManager){
        // $book=$repo->find($id);
        $form = $this->createForm(BookType::class, $book)
        ->add('Update',SubmitType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            return $this->redirectToRoute('AF');
        }
        return $this->render("books/Update.html.twig",
        ['ff'=>$form]);
    }
}
