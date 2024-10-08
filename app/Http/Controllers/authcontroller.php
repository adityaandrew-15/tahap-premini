<?php

namespace App\Http\Controllers;

use App\Models\kursus;
use Illuminate\Http\Request;

class authcontroller extends Controller
{

    private $params = [];
    public function kursus(){
        $this->params['data'] = kursus::get();
        return view('kursus.kursus',$this->params);
    }

    public function tambahKursus(){
        return view('kursus.tambah');
    }

    public function simpanKursus(Request $request){
        $request->validate([
            'kursus' => 'required|unique:kursuses,kursus',
            'deskripsi' => 'required'
        ],[
            'kursus.required' => 'Mohon inputkan kursus',
            'kursus.unique' => 'Kursus sudah tersedia',
            'deskripsi.required' => 'Mohon mengisi deskripsi'
        ]);
        kursus::create([
            'kursus' => $request->kursus,
            'deskripsi' => $request->deskripsi
        ]);
        return redirect()->route('kursus')->with('berhasil','Berhasil menambah kursus');
    }

    public function updateKursus($id){
        $kursus = kursus::where('id',$id)->first();
        return view('kursus.update',compact('kursus'));
    }

    public function upgradeKursus(Request $request, $id){
        $request->validate([
            'kursus' => 'required|unique:kursuses,kursus,' . $id,
            'deskripsi' => 'required'
        ],[
            'kursus.required' => 'Mohon inputkan kursus',
            'kursus.unique' => 'Kursus tersedia',
            'deskripsi.required' => 'Mohon mengisi deskripsi'
        ]); 

        $kursus = kursus::findOrFail($id);

        if($kursus->kursus == $request->kursus && $kursus->deskripsi == $request->deskripsi){
            return redirect()->route('kursus')->with('berhasil','Tidak ada perubahan yang tersimpan');
        }
        $kursus->update([
            'kursus' => $request->kursus,
            'deskripsi' => $request->deskripsi
        ]);
        return redirect()->route('kursus')->with('berhasil','Berhasil memperbarui data kursus');
    }

    public function deleteKursus($id){
        $kursus = kursus::find($id);
        if($kursus->instruktur->count() > 0){
            return redirect()->back()->with('eror','data masih dipakai');
        }
        $kursus->delete();
        return redirect()->route('kursus')->with('berhasil','selamat data berhasil dihapus');

    }
}
