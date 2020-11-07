<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table = 't_berita';

    protected $fillable = [
    	'gambar', 'judul', 'konten'];
}
