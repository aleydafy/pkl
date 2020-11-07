<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galeri;
use Redirect, Response;

class GaleriController extends Controller
{
    public function index()
    {
      $data = Galeri::all();

      return view('galeri', compact('data'))->with('i', (request()->input('page', 1) - 1));
    }

    public function create()
    {
        return view('galeri.create');
    }

    public function store(Request $request)
    {   
        $data=$request->validate([
        'gambar' => 'required',
        ]);  

    	if ($request->hasFile('gambar')) {
    		$file = $request->file('gambar');
    		$fileName = time().'.'.$file->getClientOriginalExtension();
    		$destinationaPath = public_path('/images');
    		$file->move($destinationaPath, $fileName);
    	}

        $id = $request->id;
        Galeri::updateOrCreate(['id' => $id],
                ['gambar' => $fileName
            ]);

        if(empty($request->id))
            $msg = 'Gambar berhasil ditambahkan';
        else
            $msg = 'Gambar berhasil diperbarui';
        return redirect()->route('galeri')->with('success',$msg);
    }

    public function edit($id)
    {
        $where = array('id' => $id);
        $data  = Galeri::where($where)->first();
     
        return Response::json($data);
    }

    public function destroy($id)
    {
        $data = Galeri::where('id',$id)->delete();
        return Response::json($data);
    }
}
