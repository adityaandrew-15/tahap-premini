<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class siswacontroller extends Controller
{
    public function siswa(){
        $data = DB::table('siswas')
              ->join('pendaftarans','pendaftaran.id','=','siswas.pendaftaran_id')
              ->select('pendaftarans.id','pendaftarans.nama','kursuses.kursus','pendaftarans.tanggal_mulai','pendaftarans.tanggal_selesai')
              ->get();
        return view('pendaftaran.pendaftaran',compact('data'));
    }

    public function tambahPendaftaran(){
        $siswa = siswa::all();
        return view('pendaftaran.tambah',compact('kursus'));
    }

    public function simpanPendaftaran(Request $request){
        $request->validate([
            'nama' => 'required|unique:pendaftarans,nama',
            'kursus_id' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required'
        ],[
            'nama.required' => 'Nama wajib diisi',
            'nama.unique' => 'Nama yang anda inputkan sudah tersedia',
            'kursus_id.required' => 'Mohon pilih kursus',
            'tanggal_mulai.required' => 'Mohon masukkan tanggal',
            'tanggal_selesai.required' => 'Mohon inputkan tanggal'
        ]);

        siswa::create([
            'nama' => $request->nama,
            'kursus_id' => $request->kursus_id,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai
        ]);
        return redirect()->route('pendaftaran')->with('berhasil','Pendaftaran berhasil, silahkan verifikasi pendaftaran anda di table siswa');
    }

    public function deletePendaftaran($id){
        siswa::where('id',$id)->delete();
        return redirect()->route('pendaftaran')->with('berhasil','Data berhasil dihapus');
    }

    public function updatePendaftaran($id){
        $siswa = siswa::where('id',$id)->first();
        $kur = siswa::all();
        return view('pendaftaran.update',compact('pendaftaran','kur'));
    }

    public function upgradePendaftaran(Request $request, $id){
        $request->validate([
            'nama' => 'required',
            'kursus_id' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required'
        ],[
            'nama.required' => 'Nama wajib diisi',
            'kursus_id.required' => 'Mohon pilih kursus',
            'tanggal_mulai.required' => 'Mohon masukkan tanggal',
            'tanggal_selesai.required' => 'Mohon inputkan tanggal'
        ]);
        siswa::where('id',$id)->update([
            'nama' => $request->nama,
            'kursus_id' => $request->kursus_id,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai
        ]);

        return redirect()->route('pendaftaran')->with('berhasil','Data berhasil di edit');
    }
}
