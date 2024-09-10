<?php

namespace App\Http\Controllers;

use App\Models\instruktur;
use App\Models\kursus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class inscontroller extends Controller
{
    public function ins(){
        $data = instruktur::all();
        $na = DB::table("instrukturs")
            ->join("kursuses","kursuses.id","=","instrukturs.kursus_id")
            ->select('instrukturs.nama','instrukturs.id','kursuses.kursus')
            ->get();
        return view("instruktur.ins",compact('data','na'));
    }
    public function tambahv(){
        $kursus = kursus::all();
        return view('instruktur.tambah',compact('kursus'));
    }
    public function simpanins(Request $request){
        $request->validate([
            'nama' => 'required|unique:instrukturs,nama',
            'kursus_id' => 'required'
        ],[
            'nama.required' => 'Mohon inputkan kursus',
            'nama.unique'=>'nama sudah ada',
            'kursus_id.required' => 'Mohon mengisi deskripsi'
        ]);
        instruktur::create([
            'nama'=> $request->nama,
        'kursus_id'=> $request->kursus_id,
        ]);
        return redirect()->route('instruktur')->with('berhasil','Berhasil menambah instruktur');
    }
    public function updateins($id){
        $ins = instruktur::where('id',$id)->first();
        $kur = kursus::all();
        return view('instruktur.update',compact('ins','kur'));
    }
    public function upgradeins(Request $request, $id){
        $request->validate([
            'nama' => 'required',
            'kursus_id' => 'required'
        ],[
            'nama.required' => 'Mohon inputkan nama',
            'kursus_id.required' => 'Mohon mengisi kursus'
        ]);
        instruktur::where('id',$id)->update([
            'nama' => $request->nama,
            'kursus_id' => $request->kursus_id
        ]);
        return redirect()->route('instruktur')->with('berhasil','Berhasil memperbarui data instruktur');
    }
    public function deleteins($id){
        instruktur::where('id',$id)->delete();
        return redirect()->route('instruktur')->with('berhasil','selamat data berhasil dihapus');
    }
}
