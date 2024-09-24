@extends('layouts.app')
@section('content')
    
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
    <title>Pendaftaran</title>
</head>

<body>

    @if (session('berhasil'))
        <script>
            alert("{{session('berhasil')}}")
        </script>
    @endif
    <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
        <div class="container">
            <div class="col-lg-6 align-self-center">
                <form action="{{route('upgradeFoto',$dt->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="mb-3 row">
                        <label for="inputAlamat" class="col-sm-2 col-form-label">Ubah foto disini</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="foto" name="foto">
                            @error('foto')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputAlamat" class="col-sm-2 col-form-label">foto</label>
                        <div class="col-sm-10">
                            <img src="{{ asset('storage/foto-siswa/'.$dt->foto) }}" alt="">
                        </div>
                    </div>
                    <button class="btn btn-outline-primary" style="margin-left: 98px" type="submit">Simpan</button>
                </form>
            </div>
        </div>
    </div>


    <script>
        const tanggalMulai = document.getElementById('tanggal_mulai');
        const tanggalSelesai = document.getElementById('tanggal_selesai');
    
        // Event listener untuk mengatur tanggal selesai maksimal 3 bulan setelah tanggal mulai
        tanggalMulai.addEventListener('change', function () {
            if (tanggalMulai.value) {
                const mulaiDate = new Date(tanggalMulai.value);
                mulaiDate.setMonth(mulaiDate.getMonth() + 3); // Menambah 3 bulan
                const maxDate = mulaiDate.toISOString().split('T')[0];
                tanggalSelesai.setAttribute('max', maxDate);
            }
        });
    </script>
    <script src="{{ asset('home/assets/js/animation.js') }}"></script>
</body>

</html>
@endsection