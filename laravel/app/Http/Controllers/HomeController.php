<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Berita;
use App\Models\Galeri;

class HomeController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}