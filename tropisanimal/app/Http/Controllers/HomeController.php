<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Berita;
use App\Models\Galeri;

class HomeController extends Controller
{
    public function index()
    {
    	$profileTerbaru = Profile::orderBy('created_at', 'desc')->limit(1)->first();
    	$beritaTerbaru = Berita::orderBy('created_at', 'desc')->limit(6)->get();
    	$galeriTerbaru = Galeri::orderBy('created_at', 'desc')->limit(6)->get();

    	return view('home', compact('profileTerbaru', 'beritaTerbaru', 'galeriTerbaru'));
    }
}
