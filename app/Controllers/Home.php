<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('layouts/header')
               .view('pages/home')
               .view('layouts/footer');
    }
}
