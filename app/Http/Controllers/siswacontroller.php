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
    public function siswa(Request $request){
        $search = $request->input('search');
        $siswa = DB::table('siswas')
              ->join('pendaftarans','pendaftarans.id','=','siswas.pendaftaran_id')
              ->join('kelas','kelas.id','=','siswas.kelas_id')
              ->where('pendaftarans.nama', 'like', '%' . $search . '%')
              ->select('pendaftarans.nama','siswas.foto','kelas.kelas','siswas.alamat','siswas.status','siswas.id')
              ->get();
        return view('siswa.siswa',compact('siswa'));
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

        return redirect()->route('siswaview')->with('berhasil','berhasil verifikasi akun');
    }

    public function deleteSiswa($id){
        $siswa = siswa::find($id);

        if($siswa->status == 'Aktif'){
            return redirect()->back()->with('eror','Data tidak bisa dihapus karena masih berstatus Aktif');
        }
        $siswa->delete();
        return redirect()->route('siswaview')->with('berhasil','Data berhasil dihapus');
    }
    public function updatesiswa($id){
        $siswa = siswa::where('id',$id)->first();
        $kelas = kelas::all();
        $pendaftaran = pendaftaran::all();
        return view('siswa.update',compact('siswaview','kelas','pendaftaran'));
    }

    public function upgradesiswa(Request $request, $id){
        $request->validate([
            'pendaftaran_id' => 'required',
            'foto' => 'required',
            'kelas_id' => 'required',
            'alamat' => 'required'
        ],[
            'pendaftaran_id.required' => 'Nama wajib diisi',
            'foto.required' => 'Mohon pilih foto',
            'kelas_id.required' => 'Mohon masukkan kelas',
            'alamat.required' => 'Mohon inputkan alamat'
        ]);
        siswa::where('id',$id)->update([
            'pendaftaran_id' => $request->pendaftaran_id,
            'foto' => $request->foto,
            'kelas_id' => $request->kelas_id,
            'alamat' => $request->alamat
        ]);

        return redirect()->route('siswaview')->with('berhasil','Data berhasil di edit');
    }
    



}
