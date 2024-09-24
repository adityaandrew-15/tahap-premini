<?php

namespace App\Http\Controllers;

use App\Models\kelas;
use App\Models\siswa;
use Illuminate\Http\Request;

class kelascontroller extends Controller
{
    public function kelas(){
        $data = kelas::all();
        return view("kelas.kelas",compact('data'));
    }
    public function tambahkelas(){
        return view('kelas.tambah');
    }
    public function simpankel(Request $request){
        $request->validate([
            'kelas' => 'required',
        ],[
            'kelas.required' => 'Mohon inputkan kursus',
        ]);
        kelas::create([
            'kelas'=> $request->kelas,
        ]);
        return redirect()->route('kelas')->with('berhasil','Berhasil menambah kelas');
    }
    public function updatekelas($id){
        $kel = kelas::where('id',$id)->first();
        return view('kelas.update',compact('kel'));
    }
    public function upgradekel(Request $request, $id){
        $request->validate([
            'kelas' => 'required',
        ],[
            'kelas.required' => 'Mohon inputkan kelas',
        ]);
        kelas::where('id',$id)->update([
            'kelas' => $request->kelas,
        ]);
        return redirect()->route('kelas')->with('berhasil','Berhasil memperbarui data kelas');
    }
    public function deletekelas($id){
        $siswa = siswa::find($id);
        if($siswa->kelas->count() > 0){
            return redirect()->back()->with('eror','Data tidak bisa dihapus karena masih digunakan');
        }
        $siswa->delete();
        return redirect()->route('kelas')->with('berhasil','Data berhasil dihapus');
    }
}
