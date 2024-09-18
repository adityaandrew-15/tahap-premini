<?php

namespace App\Http\Controllers;

use App\Models\kursus;
use App\Models\nilai;
use App\Models\pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class nilaiController extends Controller
{
    public function nilai(){
        $nama = DB::table('nilais')
              ->join('pendaftarans','pendaftarans.id','=','nilais.pendaftaran_id')
              ->join('kursuses','kursuses.id','=','nilais.kursus_id')
              ->select('nilais.id','pendaftarans.nama','nilais.nilai','kursuses.kursus')
              ->get();
        return view('nilai.nilai',compact('nama'));
    }

    public function tambahNilai(){
        $nama = pendaftaran::where('keterangan','Terverifikasi')->get();
        $kursus = kursus::all();
        return view('nilai.tambah',compact('nama','kursus'));
    }

    public function simpanNilai(Request $request){
        $request->validate([
            'pendaftaran_id' => 'required',
            'kursus_id' => 'required',
            'nilai' => 'required'
        ],[
            'pendaftaran_id.required' => 'Mohon untuk inputkan nama',
            'kursus_id.required' => 'Mohon untuk inputkan kursus',
            'nilai.required' => 'Mohon untuk inputkan nilai'
        ]);
        
        nilai::create([
            'pendaftaran_id' => $request->pendaftaran_id,
            'kursus_id' => $request->kursus_id,
            'nilai' => $request->nilai
        ]);
        return redirect()->route('nilai')->with('berhasil','Nilai berhasil ditambahkan');
    }

    public function updateNilai($id){
        $nilai = nilai::where('id',$id)->first();
        $nama = pendaftaran::where('keterangan','Terverifikasi')->get();
        $kursus = kursus::all();
        return view('nilai.update',compact('nilai','nama','kursus'));
    }

    public function upgradeNilai(Request $request, $id){
        $request->validate([
            'pendaftaran_id' => 'required',
            'kursus_id' => 'required',
            'nilai' => 'required'
        ],[
            'pendaftaran_id.required' => 'Mohon untuk inputkan nama',
            'kursus_id.required' => 'Mohon untuk inputkan kursus',
            'nilai.required' => 'Mohon untuk inputkan nilai'
        ]);

        nilai::where('id',$id)->update([
            'pendaftaran_id' => $request->pendaftaran_id,
            'kursus_id' => $request->kursus_id,
            'nilai' => $request->nilai
        ]);
        return redirect()->route('nilai')->with('berhasil','Berhasil memperbarui data');
    }

    public function deleteNilai($id){
        $nilai = nilai::find($id);

        if($nilai->pendaftaran == "Terverifikasi"){
            return redirect()->back()->with('eror','Data tidak bisa dihapus');
        }
        $nilai->delete();
        return redirect()->route('nilai')->with('berhasil','Data berhasil dihapus');
    }
}
