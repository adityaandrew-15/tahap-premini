<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/templatemo">
    <link rel="stylesheet" href="{{ asset('home/assets/css/templatemo-space-dynamic.css') }}">
    <link rel="stylesheet" href="{{ asset('home/assets/css/animated.css') }}">
    <title>Tambah Kursus</title>
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
                            <li class="scroll-to-section"><a href="/dashboard" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#about">About Us</a></li>
                            <li class="scroll-to-section"><a href="/kursus">kursus</a></li>
                            <li class="scroll-to-section"><a href="#portfolio">instruktur</a></li>
                            <li class="scroll-to-section"><a href="#blog">siswa</a></li>
                            <li class="scroll-to-section"><a href="#contact">pendaftaran</a></li>
                            <li class="scroll-to-section">
                                <div class="main-red-button"><a href="/logout"
                                        onclick="return confirm('Anda yakin ingin logout?')">logout</a></div>
                            </li>
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
            <div class="col-lg-6 align-self-center">
                <form action="{{route('upgradeKursus',$kursus->id)}}" method="POST">
                    @csrf
                    @method('put')
                    <div class="mb-3 row">
                        <label for="inputKursus" class="col-sm-2 col-form-label">Kursus</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputPassword" name="kursus" value="{{$kursus->kursus}}">
                            @error('kursus')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputDeskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputPassword" name="deskripsi" value="{{$kursus->deskripsi}}}">
                            @error('deskripsi')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <button class="btn btn-outline-primary" style="margin-left: 98px" type="submit">Simpan</button>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('home/assets/js/animation.js') }}"></script>
</body>

</html>