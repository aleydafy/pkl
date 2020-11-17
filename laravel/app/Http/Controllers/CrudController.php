<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\Profile;
// use App\Models\Berita;
// use App\Models\Galeri;

class CrudController extends Controller
{
    public function index()
    {
        return view('crud');
    }

    public function edit(Blog $blog){
        return view('CrudEdit');
    }
}