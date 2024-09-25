<?php

namespace App\Http\Controllers;

use App\Models\kursus;
use App\Models\pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class daftarcontroller extends Controller
{
    public function pendaftaran(){
        $data = DB::table('pendaftarans')
              ->join('kursuses','kursuses.id','=','pendaftarans.kursus_id')
              ->select('pendaftarans.id','pendaftarans.nama','kursuses.kursus','pendaftarans.tanggal_mulai','pendaftarans.tanggal_selesai','pendaftarans.keterangan')
              ->get();
        return view('pendaftaran.pendaftaran',compact('data'));
    }

    public function tambahPendaftaran(){
        $kursus = kursus::all();
        return view('pendaftaran.tambah',compact('kursus'));
    }

    public function simpanPendaftaran(Request $request){
        $request->validate([
            'nama' => 'required',
            'kursus_id' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required|after_or_equal:tanggal_mulai'
        ],[
            'nama.required' => 'Nama wajib diisi',
            'kursus_id.required' => 'Mohon pilih kursus',
            'tanggal_mulai.required' => 'Mohon masukkan tanggal',
            'tanggal_selesai.required' => 'Mohon inputkan tanggal',
            'tanggal_selesai.after_or_equal' => 'Tanggal selesai tidak boleh sebelum tanggal mulai'
        ]);

        $nama = pendaftaran::where('nama', $request->nama)
                           ->where('kursus_id', $request->kursus_id)
                           ->first();

        if($nama){
            return redirect()->back()->with('eror','nama ini sudah memmilih kursus tersebut');
        }
        
        pendaftaran::create([
            'nama' => $request->nama,
            'kursus_id' => $request->kursus_id,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai
        ]);
        return redirect()->route('pendaftaran')->with('berhasil','Pendaftaran berhasil, silahkan verifikasi pendaftaran anda di table siswa');
    }

    public function deletePendaftaran($id){
        $pendaftar = pendaftaran::find($id);
        if($pendaftar->siswa->count() > 0){
            return redirect()->back()->with('eror','Data tidak bisa dihapus karena masih digunakan');
        }
        $pendaftar->delete();
        return redirect()->route('pendaftaran')->with('berhasil','Data berhasil dihapus');
    }

    public function updatePendaftaran($id){
        $pendaftaran = pendaftaran::where('id',$id)->first();
        $kur = kursus::all();
        return view('pendaftaran.update',compact('pendaftaran','kur'));
    }

    public function upgradePendaftaran(Request $request, $id){
        $request->validate([
            'nama' => 'required',
            'kursus_id' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required|after_or_equal:tanggal_mulai'
        ],[
            'nama.required' => 'Nama wajib diisi',
            'kursus_id.required' => 'Mohon pilih kursus',
            'tanggal_mulai.required' => 'Mohon masukkan tanggal',
            'tanggal_selesai.required' => 'Mohon inputkan tanggal',
            'tanggal_selesai.after_or_equal' => 'Tanggal selesai tidak boleh sebelum tanggal mulai'
        ]);
        pendaftaran::where('id',$id)->update([
            'nama' => $request->nama,
            'kursus_id' => $request->kursus_id,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai
        ]);

        return redirect()->route('pendaftaran')->with('berhasil','Data berhasil di edit');
    }
}
