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

    <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
        <div class="container">
            <div class="col-lg-6 align-self-center">
                <form action="/simpan/pendaftaran" method="POST">
                    @csrf
                    <div class="mb-3 row">
                        <label for="inputNama" class="col-sm-2 col-form-label">nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputPassword" name="nama" value="{{old('nama')}}">
                            @error('nama')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputKursus" class="col-sm-2 col-form-label">Kursus</label>
                        <div class="col-sm-10">
                            <select name="kursus_id" id="kursus_id" class="form-control">
                                <option></option>
                                @foreach ($kursus as $kur)
                                    <option value="{{$kur->id}}">{{$kur->kursus}}</option>
                                @endforeach
                            </select>
                            @error('kursus')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputKursus" class="col-sm-2 col-form-label">Tanggal Mulai</label>
                        <div class="col-sm-10">
                            <input type="date" min="{{date('Y-m-d')}}" class="form-control" id="tanggal_mulai" name="tanggal_mulai">
                            @error('tanggal_mulai')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputKursus" class="col-sm-2 col-form-label">Tanggal Selesai</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai">
                            @error('tanggal_selesai')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
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