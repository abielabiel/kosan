<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\PenyewaModel;
use Illuminate\Foundation\Validation\ValidatesRequests;

class PenyewaController extends Controller
{
    use ValidatesRequests;
    
    public function penyewa()
    {
        $datapenyewa = PenyewaModel::all(); 

        return view('penyewa/penyewa', ['var_penyewa' => $datapenyewa]); 
    }
    public function penyewatambah()
       {
        return view('penyewa/penyewatambah');
    }

    public function penyewasimpan(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'no_telp' => 'required',
            'alamat' => 'required'
        ]);

        \App\Models\PenyewaModel::create([
            'name' => $request->name,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat
        ]);

        return redirect('/penyewa');
    }

   
    public function penyewaedit($idpenyewa)
    {
        $penyewa = \App\Models\PenyewaModel::find($idpenyewa);
        return view('penyewa.penyewaedit', compact('penyewa'));
    }

    public function penyewaupdate($idpenyewa, Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'no_telp' => 'required',
            'alamat' => 'required'
        ]);
        
        $penyewa = PenyewaModel::find($idpenyewa);
        $penyewa->name = $request->name;
        $penyewa->email = $request->email;
        $penyewa->no_telp = $request->no_telp;
        $penyewa->alamat = $request->alamat;
        $penyewa->save();
        
        return redirect('/penyewa');
    }

    public function penyewadelete($idpenyewa) 
    { 
        $datapenyewa = PenyewaModel::find($idpenyewa); 
        $datapenyewa->delete(); 
        
        return redirect('/penyewa'); 
    }

    public function show($id)
    {
        $penyewa = Penyewa::findOrFail($id);
        return view('penyewa.show', compact('penyewa'));
    }
}
