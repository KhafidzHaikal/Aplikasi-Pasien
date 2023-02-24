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
    <p style="position:absolute;left:0">Tanggal Cetak : {{ $date }}</p>
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
        <tbody>
            @foreach ($obats as $obat_masuk)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $obat_masuk->tanggal_masuk->translatedFormat('d F Y') }}</td>
                    <td>{{ $obat_masuk->obats->name }}</td>
                    <td>{{ $obat_masuk->obats->sediaan }}</td>
                    <td>{{ $obat_masuk->obats->tanggal_kadaluarsa->translatedFormat('d F Y') }}</td>
                    <td>{{ $obat_masuk->stok }}</td>
                    <td>@currency($obat_masuk->obats->harga)</td>
                    <td>@currency($obat_masuk->obats->formula_calculation)</td>
                    <td rowspan="">{{ $obat_masuk->obats->stok_lama }}</td>
                    {{-- <td>{{ $obat_masuk->total }}</td> --}}

                    <td>{{ $date }}</td>
                    <td>{{ $obat_masuk->obats->name }}</td>
                    <td>{{ $obat_masuk->obats->sediaan }}</td>
                    <td>{{ $obat_masuk->obats->stok_baru }}</td>
                    <td>@currency($obat_masuk->obats->jumlah_stok_baru)</td>
                    <td>{{ $obat_masuk->obats->total_stok }}</td>
                    <td>@currency($obat_masuk->obats->jumlah_sisa_obat)</td>
                </tr>
                {{-- @if ($obat_masuk->obats->count())
                    <tr>
                        <td colspan="16" style="background-color: #e3e3e3"></td>
                    </tr>
                @endif --}}
            @endforeach
        </tbody>
    </table>
</body>

</html>
