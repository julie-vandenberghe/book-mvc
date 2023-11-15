<?php

namespace M2i\Mvc\Controller;

use M2i\Mvc\Model\Book;
use M2i\Mvc\View;

class BookController 
{
    public function list()
    {

        $books = Book::all();

        //dd(Book::all());
        //dd = dump + die

        return View::render('list', [
            'books' => $books
        ]
    );
    
    }

    public function show($id)
    {
        $book = Book::find($id);

        if (! $book) {
            http_response_code(404);
            return View::render('404');
        }

        return View::render('show', [
            'book' => $book
    ]);
    }

    public function create()
    {
        $book = new Book();
        $title = 'Nouveau livre';
        
        /* 
        * RÉCUPÉRATION DES DONNÉES
        */
        //On vérifie que y'a qqch dans le champ title et on l'affecte à $titleBook. S'il n'y a rien, on affecte null à la variable
        $book->title = $_POST['title'] ?? ''; // ?? '' -> fonctionne que en php 7.0 minimum
        //$name = isset($_POST['name']) ? $_POST['name'] : null; //même chose que au-dessus mais en php 5
        $book->price = $_POST['price'] ?? '';
        $book->discount = $_POST['discount'] ?? '';
        $book->isbn = $_POST['isbn'] ?? '';
        $book->author = $_POST['author'] ?? '';
        $book->published_at = $_POST['published_at'] ?? '';
        $book->image = $_POST['image'] ?? '';

        //Préparation du tableau d'erreur
        $errors = [];

        if (! empty($_POST)) 
        {
            //@todo : Récupérer les images
            
                $book->save(['title', 'price', 'discount', 'isbn', 'author', 'published_at', 'image']);
                //Dans le save, on met le nom des colonnes de la table

                //@todo : View::redirect('/utilisateurs');
            
        }

        return View::render('create', [
            'title' => $title
    ]);

    }

    public static function delete($id)
    {
        $book = Book::delete($id);

        $_SESSION['success'] = "Le livre $id a été supprimé.";

        return View::redirect('/books');
    }

    
    
}

