<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Laporan Pasien BP Lansia</title>
    <!-- Favicon icon -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link rel="stylesheet" href="css/pdf.css">
</head>

<body>
    <h2>LAPORAN KUNJUNGAN PASIEN DI PUSKESMAS</h2>
    <br>
    <h2 class="mb-4" style="margin-top:-1.5rem">POLI/UNIT PELAYANAN Lansia</h2>
    <table>
        <thead>
            <th>No</th>
            <th>No. RM</th>
            <th>Nama Pasien</th>
            <th>Umur</th>
            <th>Kelamin</th>
            <th>Nama KK</th>
            <th>Diagnosa</th>
            <th>Status Diagnosa</th>
            <th>Terapi / Pengobatan</th>
            <th>Tindakan</th>
            <th>Pembayaran</th>
            <th>Dokter Pemeriksa</th>
        </thead>
        <tbody>
            @foreach ($pelayanan_pasiens as $pelayanan_pasien)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pelayanan_pasien->kajian_pasiens->pasiens->no_rm }}</td>
                    <td>{{ $pelayanan_pasien->kajian_pasiens->pasiens->name }}</td>
                    <td>{{ $pelayanan_pasien->kajian_pasiens->pasiens->tanggal_lahir->format('d-m-Y') }}</td>
                    <td>{{ $pelayanan_pasien->kajian_pasiens->pasiens->jenis_kelamin }}</td>
                    <td>{{ $pelayanan_pasien->kajian_pasiens->pasiens->nama_kk }}</td>
                    <td>{{ $pelayanan_pasien->icds->kode_icd }} - {{ $pelayanan_pasien->icds->nama_icd }}</td>
                    <td>{{ $pelayanan_pasien->jenis_kasus }}</td>
                    <td>{{ $pelayanan_pasien->penatalaksanaan }}</td>
                    <td>{{ $pelayanan_pasien->tindakan }}</td>
                    <td>{{ $pelayanan_pasien->kajian_pasiens->pasiens->pembiayaan }}</td>
                    <td>{{ $pelayanan_pasien->users->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
