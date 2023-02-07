<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF Pasien</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="css/pdf.css">
</head>

<body>
    <table class="table">
        <tbody>
            <tr>
                <th style="width: 30%" colspan="2" style="text-align: center">Administrasi Pasien</th>
            </tr>
            <tr>
                <th style="width: 30%">No Registrasi</th>
                <td>: {{ $pasien->no_rm }}</td>
            </tr>
            <tr>
                <th style="width: 30%">Tanggal Kunjungan</th>
                <td>: {{ $pasien->tanggal_kunjungan->format('d-m-Y') }}</td>
            </tr>
            <tr>
                <th style="width: 30%">Nama Petugas</th>
                <td>: {{ $pasien->nama_petugas }}</td>
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
                <td>: {{ $pasien->name }}</td>
            </tr>
            <tr>
                <th style="width: 30%">Tanggal Lahir</th>
                <td>: {{ $pasien->tanggal_lahir->format('d-m-Y') }}</td>
            </tr>
            <tr>
                <th style="width: 30%">Jenis Kelamin</th>
                <td>: {{ $pasien->jenis_kelamin }}</td>
            </tr>
            <tr>
                <th style="width: 30%">Nomor Induk Keluarga</th>
                <td>: {{ $pasien->nik }}</td>
            </tr>
            <tr>
                <th style="width: 30%">Nama Kepala Keluarga</th>
                <td>: {{ $pasien->nama_kk }}</td>
            </tr>
            <tr>
                <th style="width: 30%">Alamat</th>
                <td>: {{ $pasien->alamat }}</td>
            </tr>
            <tr>
                <th style="width: 30%">Pekerjaan</th>
                <td>: {{ $pasien->pekerjaan }}</td>
            </tr>
            <tr>
                <th style="width: 30%">Pendidikan</th>
                <td>: {{ $pasien->pendidikan }}</td>
            </tr>
            <tr>
                <th style="width: 30%">Agama</th>
                <td>: {{ $pasien->agama }}</td>
            </tr>
            <tr>
                <th style="width: 30%">Status Perkawinan</th>
                <td>: {{ $pasien->status_perkawinan }}</td>
            </tr>
            <tr>
                <th style="width: 30%">Pembiayaan</th>
                <td>: {{ $pasien->pembiayaan }}</td>
            </tr>
            <tr>
                <th style="width: 30%">Status Kunjungan</th>
                <td>: {{ $pasien->status_kunjungan }}</td>
            </tr>
            <tr>
                <th style="width: 30%">Agama</th>
                <td>: {{ $pasien->agama }}</td>
            </tr>
            <tr>
                <th style="width: 30%">Alergi Obat</th>
                <td>: {{ $pasien->alergi_obat }}</td>
            </tr>
        </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
