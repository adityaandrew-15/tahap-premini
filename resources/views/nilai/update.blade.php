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
    <title>update nilai</title>
</head>

<body>

    <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
        <div class="container">
            <div class="col-lg-6 align-self-center">
                <form action="{{route('upgradeNilai',$nilai->id)}}" method="POST">
                    @csrf
                    @method('put')
                    <div class="mb-3 row">
                        <label for="inputNama" class="col-sm-2 col-form-label">nama</label>
                        <div class="col-sm-10">
                            <select name="pendaftaran_id" id="pendaftaran_id">
                                <option value="{{$nilai->pendaftaran_id}}">{{$nilai->pendaftaran->nama}}</option>
                                @foreach ($nama as $na)
                                    <option value="{{$na->id}}">{{$na->nama}}</option>
                                @endforeach
                            </select>
                            @error('pendaftaran_id')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputKursus" class="col-sm-2 col-form-label">Kursus</label>
                        <div class="col-sm-10">
                            <select name="kursus_id" id="kursus_id">
                                <option value="{{$nilai->kursus_id}}">{{$nilai->kursus->kursus}}</option>
                                @foreach ($kursus as $kurr)
                                    <option value="{{$kurr->id}}">{{$kurr->kursus}}</option>
                                @endforeach
                            </select>
                            @error('kursus_id')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputKursus" class="col-sm-2 col-form-label">Tanggal Mulai</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="nilai" name="nilai" value="{{$nilai->nilai}}">
                            @error('nilai')
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
@endsection