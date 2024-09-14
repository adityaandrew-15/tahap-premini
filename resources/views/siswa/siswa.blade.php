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
    <title>siswa</title>
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
                    <h6>Table siswa</h6>
                    <table class="table table-stripped" border="2">
                        <thead>
                            <th>no</th>
                            <th>Nama</th>
                            <th>foto</th>
                            <th>kelas</th>
                            <th>alamat</th>
                            <th>status</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td class="text-center">{{$loop->iteration}}</td>
                                    <td>{{$item->nama}}</td>
                                    <td>{{$item->foto}}</td>
                                    <td>{{$item->kelas}}</td>
                                    <td>{{$item->alamat}}</td>
                                    <td>{{$item->status}}</td>
                                    <td>
                                        <form action="{{route('deletesiswa',$item->id)}}" method="POST">
                                            <a href="{{route('updatesiswa',$item->id)}}" class="btn btn-outline-success">Edit</a>
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
                        <a href="/tambah/siswa">tambah siswa</a>
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
