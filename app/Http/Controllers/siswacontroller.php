<?php

namespace App\Http\Controllers;

use App\Models\kelas;
use App\Models\pendaftaran;
use App\Models\siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class siswacontroller extends Controller
{
    public function siswa(){
        $data = DB::table('siswas')
              ->join('pendaftarans','pendaftarans.id','=','siswas.pendaftaran_id')
              ->join('kelas','kelas.id','=','siswas.kelas_id')
              ->select('pendaftarans.nama','siswas.foto','kelas.kelas','siswas.alamat','siswas.status','siswas.id')
              ->get();
        return view('siswa.siswa',compact('data'));
    }

    public function tambahSiswa(){
        $nama = pendaftaran::where('keterangan','Belum Terverifikasi')
              ->get();
        $kelas = kelas::all();
        return view('siswa.tambah',compact('nama','kelas'));
    }

    public function simpanSiswa(Request $request){
        $request->validate([
            'pendaftaran_id' => 'required',
            'foto' => 'required|mimes:png,jpg',
            'kelas_id' => 'required',
            'alamat' => 'required',
        ],[
            'pendaftaran_id.required' => 'Mohon pilih nama',
            'foto.required' => 'form foto tidak boleh kosong',
            'foto.mimes' => 'File Harus berupa format png atau jpg',
            'kelas_id.required' => 'Mohon untuk memilih kelas',
            'alamat.required' => 'alamat tidak boleh kosong'
        ]);

        $pendaftaran = pendaftaran::where('keterangan','Belum Terverifikasi')->first();
        
        $foto       = $request->file('foto');
        $filename   = date('Y-m-d').$foto->getClientOriginalName();
        $path       = 'foto-siswa/'.$filename;

        Storage::disk('public')->put($path,file_get_contents($foto));

        siswa::create([
            'pendaftaran_id' => $request->pendaftaran_id,
            'foto' => $filename,
            'kelas_id' => $request->kelas_id,
            'alamat' => $request->alamat
        ]);


        $pendaftar              = pendaftaran::find($request->pendaftaran_id);
        $pendaftar->keterangan  = "Terverifikasi";
        $pendaftar->save();

        return redirect()->route('siswa')->with('berhasil','berhasil verifikasi akun');
    }

    public function deleteSiswa($id){
        $siswa = siswa::find($id);

        if($siswa->status == 'Aktif'){
            return redirect()->back()->with('eror','Data tidak bisa dihapus karena masih berstatus Aktif');
        }
        $siswa->delete();
        return redirect()->route('siswa')->with('berhasil','Data berhasil dihapus');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $siswa = siswa::whereHas('pendaftaran', function ($query) use ($search){
            $query->where('nama','like', '%' . $search . '%');
        })->get();

        // Kembalikan view dan kirim data $siswa
        return view('siswa.siswa', compact('siswa   '));
    }


}
