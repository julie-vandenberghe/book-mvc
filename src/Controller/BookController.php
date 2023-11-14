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
        $book->title = $_POST['title'] ?? null;
        $errors = [];

        if (! empty($_POST)) 
        {
            if (empty($book->title)) 
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