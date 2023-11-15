<?php

namespace M2i\Mvc\Controller;

use M2i\Mvc\View;
use M2i\Mvc\Model\Book;

class SearchController
{
    public function search()
    {
        $titleOrISBN = $_POST['titleOrISBN'] ?? null;

        return View::render('search', [
            'title'     => 'Books search',
            'results'   => !!$titleOrISBN ? Book::findByTitleOrISBN($titleOrISBN) : null
        ]);
    }
}
