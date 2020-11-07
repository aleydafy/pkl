<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use Redirect, Response;

class BeritaController extends Controller
{
    public function index()
    {
      $data = Berita::whereNotIn('id', [7])->get();
      $beritaTerbaru = Berita::orderBy('created_at', 'desc')->limit(1)->first();

      return view('berita.index', compact('data', 'beritaTerbaru'))->with('i', (request()->input('page', 1) - 1));
    }

    public function create()
    {
        return view('berita.create');
    }

    public function store(Request $request)
    {   
        $data=$request->validate([
        'gambar' => 'required',
        'judul' => 'required',
        'konten' => 'required',
        ]);  

    	if ($request->hasFile('gambar')) {
    		$file = $request->file('gambar');
    		$fileName = time().'.'.$file->getClientOriginalExtension();
    		$destinationaPath = public_path('/images');
    		$file->move($destinationaPath, $fileName);
    	}

        $id = $request->id;
        Berita::updateOrCreate(['id' => $id],
                ['gambar' => $fileName,
                'judul' => $request->judul,
                'konten' => $request->konten
            ]);

        if(empty($request->id))
            $msg = 'Berita entry created successfully.';
        else
            $msg = 'Berita data is updated successfully';
        return redirect()->route('berita.index')->with('success',$msg);
    }

    public function edit($id)
    {
        $where = array('id' => $id);
        $data  = Berita::where($where)->first();
     
        return Response::json($data);
    }

    public function destroy($id)
    {
        $data = Berita::where('id',$id)->delete();
        return Response::json($data);
    }
}
