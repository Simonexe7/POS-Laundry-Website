<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>Cetak Data Guru</title>
    <!-- CSS Files -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> -->
    <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
</head>
<body>
    <div class="container">
    <h3 class="text-center mt-4">Laporan Data Guru</h3>
    <table class="table-bordered mx-auto mt-4">
        <thead>
            <tr class="text-dark text-sm">
                <th class="text-center">Nama</th>
                <th class="text-center">NIP</th>
                <th class="text-center">Jenis Kelamin</th>
                <th class="text-center">Tempat Lahir</th>
                <th class="text-center">Tanggal Lahir</th>
                <th class="text-center">NIK</th>
                <th class="text-center">Agama</th>
                <th class="text-center">Alamat</th>
                <th class="text-center">Keaktifan</th>
                <th class="text-center">Status</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($guru as $g)
            <tr class="text-xs">
                <td>{{ $g->nama }}</td>
                <td>{{ $g->nip }}</td>
                <td>{{ $g->jenisKelamin }}</td>
                <td>{{ $g->tempatLahir }}</td>
                <td>{{ $g->tanggalLahir }}</td>
                <td>{{ $g->nik }}</td>
                <td>{{ $g->agama }}</td>
                <td>{{ $g->alamat }}</td>
                <td>{{ $g->isActive }}</td>
                <td>{{ $g->isDeleted }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
</body>
<script>
    window.print();
</script>
</html>