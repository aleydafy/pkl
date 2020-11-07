<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
Use Illuminate\Http\Response;

class profileController extends Controller
{
    public function index()
    {
        $data = Profile::whereNotIn('id', [1])->get();
        $profileBaru = Profile::orderBy('created_at', 'desc')->limit(1)->first();

        return view('profile', compact('data', 'profileBaru'))->with('i', (request()->input('page', 1) - 1));
    }

    public function create()
    {
        return view('profile.create');
    }

    public function store(Request $request)
    {   
        $data=$request->validate([
        'judul' => 'required',
        'Deskripsi' => 'required',
        ]);  

        $id = $request->id;
        Profile::updateOrCreate(['id' => $id],
                ['judul' => $request->judul,
                'deskripsi' => $request->Deskripsi
            ]);

        if(empty($request->id))
            $msg = 'Profile berhasil diperbarui';
        return redirect()->route('profile')->with('success',$msg);
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
