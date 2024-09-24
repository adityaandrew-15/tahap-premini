{{-- @extends('layouts.app')
@section('content') --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="home/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="home/assets/css/templatemo-space-dynamic.css">
    <link rel="stylesheet" href="home/assets/css/animated.css">
    <title>ulasan</title>
</head>
<body>
    @if (session('berhasil'))
        <script>
            alert("{{session('berhasil')}}")
        </script>
    @endif
    <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <nav class="main-nav">
              <!-- ***** Logo Start ***** -->
              <a href="index.html" class="logo">
                <h4>kur<span>sus</span></h4>
              </a>
              <!-- ***** Logo End ***** -->
              <!-- ***** Menu Start ***** -->
              <ul class="nav">
                <li class="scroll-to-section"><a href="/dashboard">Home</a></li>
                <li class="scroll-to-section"><a href="/kursus">kursus</a></li>
                <li class="scroll-to-section"><a href="/instruktur">instruktur</a></li>
                <li class="scroll-to-section"><a href="/pendaftaran">pendaftaran</a></li> 
                <li class="scroll-to-section"><a href="/siswa">siswa</a></li>
                <li class="scroll-to-section"><a href="/kelas">kelas</a></li> 
                <li class="scroll-to-section"><a href="/ulasan" class="active">ulasan</a></li> 
                <li class="scroll-to-section"><a href="/nilai">nilai</a></li> 
                <li class="scroll-to-section"><div class="main-red-button"><a href="/logout" onclick="return confirm('Anda yakin ingin logout?')">logout</a></div></li> 
              </ul>        
              <a class='menu-trigger'>
                  <span>Menu</span>
              </a>
              <!-- ***** Menu End ***** -->
            </nav>
          </div>
        </div>
      </div>
    </header>
      <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="row">
                <div class="col-lg-6 align-self-center">
                  <h6 class="text-center" style="font-size: 2rem; color:red" >Table Ulasan</h6>
                    <div class="main-blue-button">
                      <a href="/tambahulasan">Tambah ulasan</a>
                    </div>
                    <table class="table table-stripped mt-2" border="2">
                        <thead>
                            <th>no</th>
                            <th>nama</th>
                            <th>ulasan</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->pendaftaran->nama}}</td>
                                    <td>{{$item->ulasan}}</td>
                                    <td>
                                        <form action="{{route('deleteulasan',$item->id)}}" method="POST">
                                            <a href="{{route('updateula',$item->id)}}" class="btn btn-outline-success">Edit</a>
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-outline-danger mt-1">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
{{-- @endsection --}}