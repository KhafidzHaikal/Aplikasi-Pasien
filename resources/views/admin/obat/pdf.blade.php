@extends('components.pdf')

@section('body')
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

                    <td>{{ $obat_masuk->tanggal_masuk->translatedFormat('d F Y') }}</td>
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
@endsection
