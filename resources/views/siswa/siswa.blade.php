<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href={{"home/vendor/bootstrap/css/bootstrap.min.css"}} rel="stylesheet">
  <link rel="stylesheet" href={{"home/assets/css/fontawesome.css"}}>
    <link rel="stylesheet" href={{"home/assets/css/templatemo-space-dynamic.css"}}>
    <link rel="stylesheet" href={{"home/assets/css/animated.css"}}>
    <link rel="stylesheet" href={{"home/assets/css/owl.css"}}>
    <title>Siswa</title>
</head>
<body>
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
                  <li class="scroll-to-section"><a href="/siswa" class="active">siswa</a></li>
                  <li class="scroll-to-section"><a href="/kelas">kelas</a></li> 
                  <li class="scroll-to-section"><a href="/ulasan">ulasan</a></li> 
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
                  <h6 class="text-center" style="font-size: 2rem; color:red" >Table Siswa</h6>
                    <div class="main-blue-button">
                      <a href="/tambah/siswa">tambah siswa</a>
                    </div>
                    <form action="{{ route('siswaview') }}" method="GET" class="mt-2">
                        @csrf
                        <input type="text" name="search" placeholder="Cari Nama Pendaftar">
                        <button type="submit">Cari</button>
                    </form>
                    
                    
                    <table class="table table-stripped mt-2" border="2">
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
                            @foreach ($siswa as $item)
                                <tr>
                                    <td class="text-center">{{$loop->iteration}}</td>
                                    <td>{{$item->nama}}</td>
                                    <td><img src="{{ asset('storage/foto-siswa/'.$item->foto) }}" alt=""></td>
                                    <td>{{$item->kelas}}</td>
                                    <td>{{$item->alamat}}</td>
                                    <td>{{$item->status}}</td>
                                    <td>
                                        <form action="{{route('deleteSiswa',$item->id)}}" method="POST">
                                            <a href="{{route('updatesiswa',$item->id)}}" class="btn btn-outline-success">Edit</a>
                                            <a href="{{route('updateFoto',$item->id)}}" class="btn btn-outline-warning mt-1">Ganti Foto</a>
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
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@yield('content')
<script src={{"home/vendor/jquery/jquery.min.js"}}></script>
<script src={{"home/vendor/bootstrap/js/bootstrap.bundle.min.js"}}></script>
<script src={{"home/assets/js/owl-carousel.js"}}></script>
<script src={{"home/assets/js/animation.js"}}></script>
<script src={{"home/assets/js/imagesloaded.js"}}></script>
<script src={{"home/assets/js/templatemo-custom.js"}}></script>
</body>
</html>