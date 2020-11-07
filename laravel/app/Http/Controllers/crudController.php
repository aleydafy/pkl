<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class crudController extends Controller
{
    public function index()
    {
        return view('crud');
    }
}