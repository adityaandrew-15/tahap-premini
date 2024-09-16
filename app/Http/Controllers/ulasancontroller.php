<?php

namespace App\Http\Controllers;

use App\Models\pendaftaran;
use App\Models\ulasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ulasancontroller extends Controller
{
    public function ulasan(){
        $data = ulasan::all();
        $na = DB::table("ulasans")
            ->join("pendaftarans","pendaftarans.id","=","ulasans.pendaftaran_id")
            ->select('ulasans.pendaftaran_id','ulasans.id','pendaftarans.nama')
            ->get();
        return view("ulasan.ulasan",compact('data','na'));
    }
    public function tambahu(){
        $ulasan = pendaftaran::all();
        return view('ulasan.tambah',compact('ulasan'));
    }
    public function simpanul(Request $request){
        $request->validate([
            'pendaftaran_id' => 'required|unique:ulasans,pendaftaran_id',
            'ulasan' => 'required'
        ],[
            'pendaftarans_id.required' => 'Mohon inputkan nama',
            'pendaftarans_id.unique'=>'nama sudah ada',
            'ulasan.required' => 'Mohon mengisi ulasan'
        ]);
        ulasan::create([
            'pendaftaran_id'=> $request->pendaftaran_id,
        'ulasan'=> $request->ulasan,
        ]);
        return redirect()->route('ulasan')->with('berhasil','Berhasil menambah ulasan');
    }
    public function updateul($id){
        $ul = ulasan::where('id',$id)->first();
        $pen = pendaftaran::all();
        return view('ulasan.update',compact('ul','pen'));
    }
    public function upgradeul(Request $request, $id){
        $request->validate([
            'pendaftaran_id' => 'required',
            'ulasan' => 'required'
        ],[
            'pendaftaran_id.required' => 'Mohon inputkan nama',
            'ulasan.required' => 'Mohon mengisi ulasan'
        ]);
        ulasan::where('id',$id)->update([
            'pendaftaran_id' => $request->pendaftaran_id,
            'ulasan' => $request->ulasan
        ]);
        return redirect()->route('ulasan')->with('berhasil','Berhasil memperbarui data ulasan');
    }
    public function deleteul($id){
        ulasan::where('id',$id)->delete();
        return redirect()->route('ulasan')->with('berhasil','selamat data berhasil dihapus');
    }
}