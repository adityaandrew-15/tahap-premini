<?php

namespace App\Http\Controllers;

use App\Models\kursus;
use App\Models\nama_kursus;
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

        $nama = nilai::where('pendaftaran_id', $request->pendaftaran_id)
                     ->where('kursus_id', $request->kursus_id)
                     ->first();

        if($nama){
            return redirect()->back()->with('eror','nama dengan kursus ini sudah memiliki nilai');
        }
        
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
            'nilai' => 'required|numeric|min:0|max:100'
        ],[
            'pendaftaran_id.required' => 'Mohon untuk inputkan nama',
            'kursus_id.required' => 'Mohon untuk inputkan kursus',
            'nilai.required' => 'Mohon untuk inputkan nilai',
            'nilai.min' => 'Nilai minimal bernilai 0',
            'nilai.max' => 'Nilai maksimal dengan nilai 100',
            'nilai.numeric' => 'Nilai harus berupa angka'
        ]);

        $nilai = nilai::findOrFail($id);

        $nama = nilai::where('pendaftaran_id', $request->pendaftaran_id)
                     ->where('kursus_id', $request->kursus_id)
                     ->first();

        if($nilai->pendaftaran_id == $request->pendaftaran_id && $nilai->kursus_id == $request->kursus_id){
            $nilai->update([
                'nilai' => $request->nilai
            ]);
            return redirect()->route('nilai')->with('berhasil','Berhasil memperbarui data');
        }elseif($nama){
            return redirect()->back()->with('eror','Nama dengan kursus ini sudah memiliki nilai');
        }

        $nilai->update([
            'pendaftaran_id' => $request->pendaftaran_id,
            'kursus_id' => $request->kursus_id,
            'nilai' => $request->nilai
        ]);

        return redirect()->route('nilai')->with('berhasil','Berhasil memperbarui data');
    }

    public function deleteNilai($id){
        $nilai = nilai::find($id);

        // if($nilai->pendaftaran == "Terverifikasi"){
        //     return redirect()->back()->with('eror','Data tidak bisa dihapus');
        // }
        $nilai->delete();
        return redirect()->route('nilai')->with('berhasil','Data berhasil dihapus');
    }

    public function getKursus($pendaftaran_id){
        $pendaftaran = pendaftaran::findOrFail($pendaftaran_id);

        $kursus = kursus::where('id', $pendaftaran->kursus_id)->get();
        return response()->json($kursus);
    }
}
