<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function index(){
        return view('index');
    }

    public function profile(){
        return view('profile');
    }

    public function berita(){
        return view('berita');
    }

    public function galeri(){
        return view('galeri');
    }

    public function kontak(){
        return view('kontak');
    }
}