<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }

    public function home2(){
        return view('layouts/header')
               .view('pages/home')
               .view('layouts/footer');
    }
}
