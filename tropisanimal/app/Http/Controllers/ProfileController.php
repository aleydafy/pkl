<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use Redirect, Response;

class ProfileController extends Controller
{
    public function index()
    {
      $data = Profile::whereNotIn('urutan', [1])->orderBy('urutan', 'asc')->get();
      $profileTerbaru = Profile::orderBy('urutan', 'asc')->limit(1)->first();

      return view('profile.index', compact('data', 'profileTerbaru'))->with('i', (request()->input('page', 1) - 1));
    }

    public function create()
    {
        return view('profile.create');
    }

    public function store(Request $request)
    {   
        $data=$request->validate([
        'urutan' => 'required',
        'judul' => 'required',
        'deskripsi' => 'required',
        ]);  

        $id = $request->id;
        Profile::updateOrCreate(['id' => $id],
                ['urutan' => $request->urutan,
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi
            ]);

        if(empty($request->id))
            $msg = 'Profile entry created successfully.';
        else
            $msg = 'Profile data is updated successfully';
        return redirect()->route('profile.index')->with('success',$msg);
    }

    public function edit($id)
    {
        $where = array('id' => $id);
        $data  = Profile::where($where)->first();
     
        return Response::json($data);
    }

    public function destroy($id)
    {
        $data = Profile::where('id',$id)->delete();
        return Response::json($data);
    }
}
