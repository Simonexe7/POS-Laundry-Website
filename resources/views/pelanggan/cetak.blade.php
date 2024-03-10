<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>Cetak Data Pelanggan</title>
    <!-- CSS Files -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> -->
    <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
</head>
<body>
    <div class="container">
    <h3 class="text-center mt-4">Laporan Data Pelanggan</h3>
    <table class="table-bordered mx-auto mt-4">
        <thead>
            <tr class="text-dark text-sm">
                <th class="text-center">Nama</th>
                <th class="text-center">Alamat</th>
                <th class="text-center">Jenis Kelamin</th>
                <th class="text-center">No. Telp</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($member as $m)
            <tr class="text-xs">
                <td>{{ $m->nama }}</td>
                <td>{{ $m->alamat }}</td>
                <td>{{ $m->jenis_kelamin }}</td>
                <td>{{ $m->tlp }}</td>
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