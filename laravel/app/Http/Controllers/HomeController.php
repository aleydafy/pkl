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
        $profileBaru = Profile::orderBy('created_at', 'desc')->limit(1)->first();
        $beritaBaru = Berita::orderBy('created_at', 'desc')->limit(6)->get();
        $galeriBaru = Galeri::orderBy('created_at', 'desc')->limit(6)->get();

        return view('index', compact('profileBaru', 'beritaBaru', 'galeriBaru'));
    }
}