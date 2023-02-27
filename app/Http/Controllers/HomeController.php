<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(string $name = 'Nicht gesetzt')
    {
        $age = 20;

        return view('home', compact('name', 'age'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function sendConatct()
    {
        return 'Danke fürs kontaktieren!';
    }
}
