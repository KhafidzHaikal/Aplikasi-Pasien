<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>{{ $title }}</title>
    <!-- Favicon icon -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link rel="stylesheet" href="css/pdf.css">
</head>

<body>
    <style>
        .kop-surat div{
            line-height: 10%
        }
    </style>
    <div class="kop-surat">
        <img class="pemkab" src="{{ public_path('img/pemkab.png') }}" style="width: 8em; height: 8em">
        <div>
            <h3>PEMERINTAH KABUPATEN CIREBON</h3>
            <h3>DINAS KESEHATAN KABUPATEN CIREBON</h3>
            <h1>UPTD PUSKESMAS PANGURAGAN</h1>
            <p>Jln. Nyimas Gandasari No 85 Panguragan Kulon</p>
            <p>Kec. Panguragan Kab. Cirebon Telp. (0231) 88350109 Email : pkm.panguragancirebonkab.go.id 45163</p>
        </div>
        <img class="puskesmas" src="{{ public_path('img/puskesmas.png') }}" style="width: 8em; height: 8em">
        <div class="line-2"></div>
        <div class="line-3"></div>
    </div>
    <h2 style="text-align: center; text-decoration:underline">KARTU ASUHAN KEPERAWATAN RAWAT JALAN (INDIVIDU)</h2>
    <br>
    <div class="header">
        <div class="left">
            <p><strong>No.
                    Reg</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                {{ $askep->pelayanan_pasiens->kajian_pasiens->pasiens->no_rm }}</p>
            <p><strong>Nama Pasien</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                {{ $askep->pelayanan_pasiens->kajian_pasiens->pasiens->name }}</p>
            <p><strong>Tanggal Lahir</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                {{ $askep->pelayanan_pasiens->kajian_pasiens->pasiens->tanggal_lahir->translatedFormat('d F Y') }}</p>
            <p><strong>Jenis Kelamin</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                {{ $askep->pelayanan_pasiens->kajian_pasiens->pasiens->jenis_kelamin }}</p>
        </div>
        <div class="right">
            <p><strong>Poli</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                {{ $askep->pelayanan_pasiens->unit_pelayanans->name }}</p>
            <p><strong>Nama Kepala Keluarga</strong>&nbsp;&nbsp;&nbsp;:
                {{ $askep->pelayanan_pasiens->kajian_pasiens->pasiens->nama_kk }}</p>
            <p><strong>Alamat</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                {{ $askep->pelayanan_pasiens->kajian_pasiens->pasiens->alamat }}</p>
            <p><strong>Tanggal Cetak</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                {{ $date }}</p>
        </div>
    </div>
    <table style="position: relative;">
        <thead>
            <th>Tanggal</th>
            <th>Pengkajian</th>
            <th>Diagnosa</th>
            <th>Tujuan</th>
            <th>Intervensi</th>
            <th>Implementasi</th>
            <th>Evaluasi</th>
            <th>Perawat</th>
        </thead>
        <tbody>
            <tr>
                <td>{{ $askep->tanggal_pengkajian->translatedFormat('d F Y') }}</td>
                <td>
                    Data Subyektif : <p>{{ $askep->data_subyektif }}</p>
                    Data Obyektif : <p>{{ $askep->data_obyektif }}</p>
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
        </tbody>
    </table>
</body>

</html>
