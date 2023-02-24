<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Laporan Pasien BP UMUM</title>
    <!-- Favicon icon -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link rel="stylesheet" href="css/pdf.css">
</head>

<body>
    <h2>LAPORAN ASUHAN KEPERAWATAN RAWAT JALAN (INDIVIDU)</h2>
    <br>
    <p style="position:absolute;left:0">Tanggal Kunjungan : {{ $date }}</p>
    <p style="position:absolute;right:0">Periode Tanggal {{ $newTanggalAwal }} s/d Tanggal {{ $newTanggalAkhir }}</p>
    <table class="mt-5">
        <thead>
            <th>No</th>
            <th>Tanggal Pelayanan</th>
            <th>No. RM</th>
            <th>Nama Pasien</th>
            <th>Umur</th>
            <th>Kelamin</th>
            <th>Alamat</th>
            <th>Asal Poli</th>
            <th>Diagnosa (ICD 10)</th>
            <th>Hasil Pengkajian</th>
            <th>Diagnosa</th>
            <th>Tujuan</th>
            <th>Intervensi</th>
            <th>Implementasi</th>
            <th>Evaluasi</th>
            <th>Nama Petugas</th>
        </thead>
        <tbody>
            @foreach ($askeps as $askep)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $askep->tanggal_pengkajian->translatedFormat('d F Y') }}</td>
                    <td>{{ $askep->pelayanan_pasiens->kajian_pasiens->pasiens->no_rm }}</td>
                    <td>{{ $askep->pelayanan_pasiens->kajian_pasiens->pasiens->name }}</td>
                    <td>{{ $askep->pelayanan_pasiens->kajian_pasiens->pasiens->tanggal_lahir->format('d-m-Y') }}</td>
                    <td>{{ $askep->pelayanan_pasiens->kajian_pasiens->pasiens->jenis_kelamin }}</td>
                    <td>{{ $askep->pelayanan_pasiens->kajian_pasiens->pasiens->alamat }}</td>
                    <td>{{ $askep->pelayanan_pasiens->unit_pelayanans->name }}</td>
                    <td>{{ $askep->pelayanan_pasiens->icds->kode_icd }} -
                        {{ $askep->pelayanan_pasiens->icds->nama_icd }}</td>
                    <td>
                        Data Subyektif : <p>{{ $askep->data_subyektif }}</p>
                        Data Obyektid : <p>{{ $askep->data_obyektif }}</p>
                        Hasil : <p>{{ $askep->hasil_penunjang }}</p>
                    </td>
                    <td>{{ $askep->diagnosas->kode_sdki }} - {{ $askep->diagnosas->nama_sdki }}</td>
                    <td>{{ $askep->tujuan }}</td>
                    <td>{{ $askep->intervensi }}</td>
                    <td>{{ $askep->implementasi }}</td>
                    <td>
                        <p>Obyektif : {{ $askep->obyektif }}</p>
                        <p>Subyektif : {{ $askep->subyektif }}</p>
                        <p>Assesment : {{ $askep->assesment }}</p>
                        <p>planning : {{ $askep->planning }}</p>
                    </td>
                    <td>{{ $askep->users->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
