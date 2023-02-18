<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Laporan Obat</title>
    <!-- Favicon icon -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link rel="stylesheet" href="css/pdf.css">
</head>

<body>
    <h2>LAPORAN OBAT DI PUSKESMAS</h2>
    <br>
    <p style="position:absolute;left:0">Tanggal Kunjungan : {{ $date }}</p>
    <p style="position:absolute;right:0">Periode Tanggal {{ $newTanggalAwal }} s/d Tanggal {{ $newTanggalAkhir }}</p>
    <table class="mt-5">
        <thead>
            <th rowspan="2">No</th>
            <th colspan="7">Penerimaan Obat</th>
            <th rowspan="2">Total Stok</th>
            <th colspan="5">Pengeluaran Obat</th>
            <th colspan="2">Sisa Obat</th>
        </thead>
        <thead>
            <th>Tanggal</th>
            <th>Nama Obat</th>
            <th>Satuan</th>
            <th>Kadaluarsa</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Total (Rp)</th>
            <th>Tanggal</th>
            <th>Nama Obat</th>
            <th>Satuan</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Harga</th>
        </thead>
        {{-- <thead>
            <th>1</th>
            <th>2</th>
            <th>3</th>
            <th>4</th>
            <th>5</th>
            <th>6</th>
            <th>7</th>
            <th>8</th>
            <th>9</th>
            <th>10</th>
            <th>11</th>
            <th>12</th>
            <th>13</th>
            <th>14</th>
            <th>15</th>
            <th>16</th>
        </thead> --}}
        <tbody>    
            @foreach ($obats as $obat)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $obat->tanggal_masuk->format('d-m-Y') }}</td>
                    <td>{{ $obat->name }}</td>
                    <td>{{ $obat->sediaan }}</td>
                    <td>{{ $obat->tanggal_kadaluarsa->format('d-m-Y') }}</td>
                    <td>{{ $obat->stok_lama }}</td>
                    <td>{{ $obat->harga }}</td>
                    <td>{{ $obat->formula_calculation }}</td>
                    <td>{{ $obat->stok_lama }}</td>
                    <td>{{ $date }}</td>
                    <td>{{ $obat->name }}</td>
                    <td>{{ $obat->sediaan }}</td>
                    <td>{{ $obat->stok_baru }}</td>
                    <td>{{ $obat->jumlah_stok_baru }}</td>
                    <td>{{ $obat->total_stok }}</td>
                    <td>{{ $obat->jumlah_sisa_obat }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
