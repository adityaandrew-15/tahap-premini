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
    <title>instruktur</title>
</head>
<body>
    @if (session('berhasil'))
        <script>
            alert("{{session('berhasil')}}")
        </script>
    @endif
      <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="row">
                <div class="col-lg-6 align-self-center">
                    <h6>Table instruktur</h6>
                    <table class="table table-stripped" border="2">
                        <thead>
                            <th>no</th>
                            <th>nama</th>
                            <th>kursus</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->nama}}</td>
                                    <td>{{$item->kursus->kursus}}</td>
                                    <td>
                                        <form action="{{route('deleteInstruktur',$item->id)}}" method="POST">
                                            <a href="{{route('updateview',$item->id)}}" class="btn btn-outline-success">Edit</a>
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
                        <a href="/tambahinstruktur">Tambah instruktur</a>
                      </div>
                </div>
                <div class="col-lg-6">
                    <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                      <img src="home/assets/images/dash.jpg" alt="team meeting">
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