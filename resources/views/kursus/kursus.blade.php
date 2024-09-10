<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>kursus</title>
  </head>
  <body>
    
    <div class="card" >
        <div class="card-body">
          <h5 class="card-title">tabel kursus</h5>
          <h6 class="card-subtitle mb-2 text-muted">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>no</th>
                        <th>mata pelajaran</th>
                        <th>aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->nama}}</td>
                        <td>
                            <form action=""><button type="submit">edit</button></form>
                            <form action=""><button type="submit">delete</button></form>
                        </td>
                    </tr>
                </tbody>
              </table>
              @endforeach
          </h6>
        </div>
      </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>