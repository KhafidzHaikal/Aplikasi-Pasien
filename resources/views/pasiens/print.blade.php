<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Print Pasien</title>
    <!-- Favicon icon -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    {{-- <link rel="stylesheet" href="css/pdf.css"> --}}
    <link rel="stylesheet" href="css/pdf-kajian.css">
</head>

<body>
    <style>
        .kop-surat div{
            line-height: 10%
        }

        td {
            text-align: left;
        }

    </style>
    <div class="kop-surat">
        <img class="pemkab" src="{{ public_path('img/pemkab.png') }}" style="width: 4em; height: 4em">
        <div>
            <h3 style="margin-bottom: -2px">PEMERINTAH KABUPATEN CIREBON</h3>
            <h3 style="margin-bottom: 2px">DINAS KESEHATAN KABUPATEN CIREBON</h3>
            <h1 style="margin-bottom: 0.7rem" >UPTD PUSKESMAS PANGURAGAN</h1>
            <p style="margin-bottom: 10px">Jln. Nyimas Gandasari No 85 Panguragan Kulon</p>
            <p>Kec. Panguragan Kab. Cirebon Telp. (0231) 88350109 Email : pkm.panguragancirebonkab.go.id 45163</p>
        </div>
        <img class="puskesmas" src="{{ public_path('img/puskesmas.png') }}" style="width: 4em; height: 4em">
        <div class="line-2"></div>
        <div class="line-3"></div>
    </div>
    <table class="table">
        <tbody>
            <tr>
                <th style="width: 30%" colspan="2" style="text-align: center">Administrasi Pasien</th>
            </tr>
            <tr>
                <th style="width: 30%">No Registrasi</th>
                <td> {{ $pasien->no_rm }}</td>
            </tr>
            <tr>
                <th style="width: 30%">Tanggal Kunjungan</th>
                <td> {{ $pasien->tanggal_kunjungan->translatedFormat('d F Y') }}</td>
            </tr>
            <tr>
                <th style="width: 30%">Nama Petugas</th>
                <td> {{ $pasien->users->name }}</td>
            </tr>
        </tbody>
    </table>
    <table class="table">
        <tbody>
            <tr>
                <th style="width: 30%" colspan="2" style="text-align: center">Identitas Pasien</th>
            </tr>
            <tr>
                <th style="width: 30%">Nama Pasien</th>
                <td> {{ $pasien->name }}</td>
            </tr>
            <tr>
                <th style="width: 30%">Tanggal Lahir</th>
                <td> {{ $pasien->tanggal_lahir->translatedFormat('d F Y') }}</td>
            </tr>
            <tr>
                <th style="width: 30%">Jenis Kelamin</th>
                <td> {{ $pasien->jenis_kelamin }}</td>
            </tr>
            <tr>
                <th style="width: 30%">Nomor Induk Keluarga</th>
                <td> {{ $pasien->nik }}</td>
            </tr>
            <tr>
                <th style="width: 30%">Nama Kepala Keluarga</th>
                <td> {{ $pasien->nama_kk }}</td>
            </tr>
            <tr>
                <th style="width: 30%">Alamat</th>
                <td> {{ $pasien->alamat }}</td>
            </tr>
            
        </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
