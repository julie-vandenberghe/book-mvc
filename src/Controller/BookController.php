<?php

namespace M2i\Mvc\Controller;

use M2i\Mvc\Model\Book;
use M2i\Mvc\View;

class BookController 
{
    public function list()
    {
        $name = 'Fiorella';

        $books = Book::all();

        //dd(Book::all());
        //dd = dump + die

        return View::render('list', [
            'name' => $name,
            'cars' => [1, 2, 3],
            'books' => $books,
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
            'Book' => $book
    ]);
        //dump($id);
    }

    public function create()
    {
        $book = new Book();
        
        /* 
        * RÉCUPÉRATION DES DONNÉES
        */
        //On vérifie que y'a qqch dans le champ title et on l'affecte à $titleBook. S'il n'y a rien, on affecte null à la variable
        $titleBook = $_POST['title'] ?? ''; // ?? '' -> fonctionne que en php 7.0 minimum
        //$name = isset($_POST['name']) ? $_POST['name'] : null; //même chose que au-dessus mais en php 5
        $price = $_POST['price'] ?? '';
        $discount = $_POST['discount'] ?? '';
        $isbn = $_POST['isbn'] ?? '';
        $author = $_POST['author'] ?? '';
        $date = $_POST['published_at'] ?? '';
        $image = $_POST['image'] ?? '';

        //Préparation du tableau d'erreur
        $errors = [];

        if (! empty($_POST)) 
        {
            if (empty($titleBook)) 
            {
                $errors['title'] = 'Le nom est invalide.';
            }
            if (empty($errors)) 
            {
                $book->save(['title']);
                //Dans le save, on met le nom des colonnes de la table
                //book->save(['title, 'blabla']);

                //@todo : View::redirect('/utilisateurs');
            }
        }

        return View::render('create');
    }
}