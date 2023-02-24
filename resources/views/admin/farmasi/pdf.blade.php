<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Laporan Farmasi</title>
    <!-- Favicon icon -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link rel="stylesheet" href="css/pdf.css">
</head>

<body>
    <h2>LAPORAN FARMASI DI PUSKESMAS</h2>
    <br>
    <p style="position:absolute;left:0">Tanggal Cetak : {{ $date }}</p>
    <p style="position:absolute;right:0">Periode Tanggal {{ $newTanggalAwal }} s/d Tanggal {{ $newTanggalAkhir }}</p>
    <table class="mt-5">
        <thead>
            <th rowspan="2">No</th>
            <th rowspan="2">No. RM</th>
            <th rowspan="2">Nama Pasien</th>
            <th rowspan="2">Umur</th>
            <th rowspan="2">Kelamin (L/K)</th>
            <th rowspan="2">Alamat</th>
            <th rowspan="2">Asal Poli</th>
            <th rowspan="2">Diagnosa</th>
            <th rowspan="2">Obat Yang Diresepkan</th>
            <th colspan="3">Obat Yang Diberikan</th>
            <th rowspan="2">Pembiayaan</th>
            <th rowspan="2">Dokter</th>
        </thead>
        <thead>
            <th>Nama Obat</th>
            <th>Dosis</th>
            <th>Jumlah</th>
        </thead>
        <tbody>    
            @foreach ($farmasis as $farmasi)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $farmasi->pelayanan_pasiens->kajian_pasiens->pasiens->no_rm }}</td>
                    <td>{{ $farmasi->pelayanan_pasiens->kajian_pasiens->pasiens->name }}</td>
                    <td>{{ $farmasi->pelayanan_pasiens->kajian_pasiens->pasiens->tanggal_lahir->translatedFormat('d F Y') }}</td>
                    <td>{{ $farmasi->pelayanan_pasiens->kajian_pasiens->pasiens->jenis_kelamin }}</td>
                    <td>{{ $farmasi->pelayanan_pasiens->kajian_pasiens->pasiens->alamat }}</td>
                    <td>{{ $farmasi->pelayanan_pasiens->unit_pelayanans->name }}</td>
                    <td>{{ $farmasi->pelayanan_pasiens->icds->kode_icd }} - {{ $farmasi->pelayanan_pasiens->icds->nama_icd }}</td>
                    <td>{{ $farmasi->pelayanan_pasiens->penatalaksanaan }}</td>
                    <td>{{ $farmasi->obats->name }}</td>
                    <td>{{ $farmasi->dosis }}</td>
                    <td>{{ $farmasi->stok }}</td>
                    <td>{{ $farmasi->pelayanan_pasiens->kajian_pasiens->pasiens->pembiayaan }}</td>
                    <td>{{ $farmasi->pelayanan_pasiens->users->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
