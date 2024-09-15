@extends('layouts.app')
@section('content')
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="home/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="home/assets/css/templatemo-space-dynamic.css">
    <link rel="stylesheet" href="home/assets/css/animated.css">
    <title>Pendaftaran</title>
</head>
<body>
    @if (session('berhasil'))
        <script>
            alert("{{session('berhasil')}}")
        </script>
    @endif
    @if (session('eror'))
    <script>
        alert("{{session('eror')}}")
    </script>
@endif
      <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="row">
                <div class="col-lg-6 align-self-center">
                    <h6>Table Pendaftar</h6>
                    <table class="table table-stripped" border="2">
                        <thead>
                            <th>No Pendaftarans</th>
                            <th>Nama</th>
                            <th>Kursus</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td class="text-center">{{$item->id}}</td>
                                    <td>{{$item->nama}}</td>
                                    <td>{{$item->kursus}}</td>
                                    <td>{{$item->tanggal_mulai}}</td>
                                    <td>{{$item->tanggal_selesai}}</td>
                                    <td>{{$item->keterangan}}</td>
                                    <td>
                                        <form action="{{route('deletePendaftaran',$item->id)}}" method="POST">
                                            <a href="{{route('updatePendaftaran',$item->id)}}" class="btn btn-outline-success">Edit</a>
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-outline-danger mt-1">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="main-blue-button">
                        <a href="/tambah/pendaftaran">Daftar sekarang</a>
                      </div>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <script src="home/assets/js/animation.js"></script>
</body>
</html>
@endsection
