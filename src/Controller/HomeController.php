<?php

namespace M2i\Mvc\Controller;

use M2i\Mvc\View;

class HomeController
{
    public function index()
    {
        return View::render('home');
    }
}
