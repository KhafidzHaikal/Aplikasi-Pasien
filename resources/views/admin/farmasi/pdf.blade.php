@extends('components.pdf')

@section('body')
    <h2>LAPORAN FARMASI DI PUSKESMAS</h2>
    <br>
    <p style="position:absolute;left:0">Tanggal Cetak : {{ $date }}</p>
    <p style="position:absolute;right:0">Periode Tanggal {{ $newTanggalAwal }} s/d Tanggal {{ $newTanggalAkhir }}</p>
    <table style="margin-top:5%">
        <thead>
            <th rowspan="2">No</th>
            <th rowspan="2">No. RM</th>
            <th rowspan="2">Nama Pasien</th>
            <th rowspan="2">Umur</th>
            <th rowspan="2">Kelamin (L/K)</th>
            <th rowspan="2">Alamat</th>
            <th rowspan="2">Asal Poli</th>
            <th rowspan="2">Diagnosa (ICD 10)</th>
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
                    <td>{{ $farmasi->pelayanan_pasiens->kajian_pasiens->pasiens->tanggal_lahir->translatedFormat('d F Y') }}
                    </td>
                    <td>{{ $farmasi->pelayanan_pasiens->kajian_pasiens->pasiens->jenis_kelamin }}</td>
                    <td>{{ $farmasi->pelayanan_pasiens->kajian_pasiens->pasiens->alamat }}</td>
                    <td>{{ $farmasi->pelayanan_pasiens->unit_pelayanans->name }}</td>
                    <td>{{ $farmasi->pelayanan_pasiens->icds->kode_icd }} -
                        {{ $farmasi->pelayanan_pasiens->icds->nama_icd }}</td>
                    <td>{{ $farmasi->pelayanan_pasiens->penatalaksanaan }}</td>
                    <td>{{ $farmasi->obats->name }}
                        <br>
                        @if ($farmasi->obatssatu)
                            {{ $farmasi->obatssatu->name }}
                        @endif
                        <br>
                        @if ($farmasi->obatsdua)
                            {{ $farmasi->obatsdua->name }}
                        @endif
                        <br>
                        @if ($farmasi->obatstiga)
                            {{ $farmasi->obatstiga->name }}
                        @endif
                        <br>
                        @if ($farmasi->obatsempat)
                            {{ $farmasi->obatsempat->name }}
                        @endif
                    </td>
                    <td>{{ $farmasi->dosis }}
                        <br>
                        {{ $farmasi->dosissatu }}
                        <br>
                        {{ $farmasi->dosisdua }}
                        <br>
                        {{ $farmasi->dosistiga }}
                        <br>
                        {{ $farmasi->dosisempat }}
                    </td>
                    <td>{{ $farmasi->stok }}
                        <br>
                        {{ $farmasi->stoksatu }}
                        <br>
                        {{ $farmasi->stokdua }}
                        <br>
                        {{ $farmasi->stoktiga }}
                        <br>
                        {{ $farmasi->stokempat }}
                    </td>
                    <td>{{ $farmasi->pelayanan_pasiens->kajian_pasiens->pasiens->pembiayaan }}</td>
                    <td>{{ $farmasi->pelayanan_pasiens->users->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
