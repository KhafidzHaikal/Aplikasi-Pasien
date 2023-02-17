<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Laporan Pasien</title>
    <!-- Favicon icon -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link rel="stylesheet" href="css/pdf.css">
</head>

<body>
    <h2>LAPORAN PENDAFTARAN PASIEN</h2>
    <br>
    <p style="position:absolute;left:0">Tanggal Kunjungan : {{ $date }}</p>
    <p style="position:absolute;right:0">Periode Tanggal {{ $newTanggalAwal }} s/d Tanggal {{ $newTanggalAkhir }}</p>
    <table class="mt-5">
        <thead>
            <th>No</th>
            <th>No. RM</th>
            <th>Nama Pasien</th>
            <th>Umur</th>
            <th>Kelamin</th>
            <th>Status Diagnosa</th>
            <th>Nama KK</th>
            <th>NIK</th>
            <th>Alamat</th>
            <th>Pembayaran</th>
            <th>Nama Petugas</th>
        </thead>
        <tbody>
            @foreach ($pasiens as $pasien)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pasien->no_rm }}</td>
                    <td>{{ $pasien->name }}</td>
                    <td>{{ $pasien->tanggal_lahir->format('d-m-Y') }}</td>
                    <td>{{ $pasien->jenis_kelamin }}</td>
                    <td>{{ $pasien->status_kunjungan }}</td>
                    <td>{{ $pasien->nama_kk }}</td>
                    <td>{{ $pasien->nik }}</td>
                    <td>{{ $pasien->alamat }}</td>
                    <td>{{ $pasien->pembiayaan }}</td>
                    <td>{{ $pasien->users->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>