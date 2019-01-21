<?php

namespace App\Controllers\Blog;

use System\Controller;

class HomeController extends Controller
{
     /**
     * Display Home Page
     *
     * @return mixed
     */
    public function index()
    {

        $this->html->setTitle($this->settings->get('site_name'));
        $view = $this->view->render('blog/home');

        return $this->blogLayout->render($view);
    }
}
