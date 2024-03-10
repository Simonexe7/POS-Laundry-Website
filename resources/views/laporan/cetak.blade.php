<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>Cetak Data Laporan</title>
    <!-- CSS Files -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> -->
    <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
</head>
<body>
    <div class="container">
    <h3 class="text-center mt-4">Laporan Data Transaksi</h3>
    <table class="table-bordered mx-auto mt-4">
        <thead>
            <tr class="text-dark text-sm">
                <th class="text-center">Tgl. Transaksi</th>
                <th class="text-center">Pelanggan</th>
                <th class="text-center">Outlet</th>
                <th class="text-center">Batas Waktu</th>
                <th class="text-center">Total Harga</th>
                <th class="text-center">Status</th>
                <th class="text-center">Dibayar</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($laporan as $t)
            <tr class="text-xs">
                <td>{{ $t->tgl }}</td>
                <td>{{ $t->nama }}</td>
                <td>{{ $t->nama_outlet }}</td>
                <td>{{ $t->batas_waktu }}</td>
                <td>{{ $t->total }}</td>
                <td>{{ $t->status }}</td>
                <td>{{ $t->dibayar }}</td>
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