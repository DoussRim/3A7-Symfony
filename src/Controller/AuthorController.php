<?php

namespace App\Controller;

use App\Entity\Author;
use App\Form\AuthorType;
use App\Repository\AuthorRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
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
    #[Route('/Affiche',name:"LL")]
    function Affiche(AuthorRepository $repo){
        //cnx avec la Base==>oK
        //ORM ==>Doctrine
        //AuthorRepository $repo
        //1) information sur l'entity
        //$authors=new Author();
        //2) quel est la fct / requete à executer
        $list=$repo->findAll();//query select * from Author
        //Result Author pr l'afficher 
        //envoyer liste Author à twig
        // return $this->render('author/Affiche.html.twig',['ll'=>$list]);
        return $this->render('author/Affiche.html.twig',['ll'=>$repo->findAll()]);
    }
    #[Route('/Supp/{id}',name:'DEL')]
    function Supprimer(Author $author,EntityManagerInterface $em,AuthorRepository $repo){
        // $author=$repo->find($id);
        $em->remove($author);
        $em->flush();
        return $this->redirectToRoute('LL');
    }
    
    #[Route('/Ajout',name:"Add")]
    function Ajout(EntityManagerInterface $em,Request $request){
        $author=new Author();
        //Formulaire
        $form=$this->createForm(AuthorType::class,$author)
        ->add('Ajout',SubmitType::class);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            //request
            $em->persist($author);
            $em->flush();
            //redirection Affiche
            // return $this->redirectToRoute('LL');
            return $this->redirect('Affiche');
        }
        return $this->render('author/Ajout.html.twig',['f'=>$form]);
    }
}
