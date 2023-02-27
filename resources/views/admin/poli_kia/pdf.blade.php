@extends('components.pdf')

@section('body')
    <h2>LAPORAN KUNJUNGAN PASIEN DI PUSKESMAS</h2>
    <br>
    <h2 class="mb-4" style="margin-top:-1.5rem">POLI/UNIT PELAYANAN KIA</h2>
    <p style="position:absolute;left:0">Tanggal Cetak : {{ $date }}</p>
    <p style="position:absolute;right:0">Periode Tanggal {{ $newTanggalAwal }} s/d Tanggal {{ $newTanggalAkhir }}</p>
    <table class="mt-5">
        <thead>
            <th>No</th>
            <th>Tanggal Pelayanan</th>
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
                    <td>{{ $pelayanan_pasien->tanggal_pemeriksaan->translatedFormat('d F Y') }}</td>
                    <td>{{ $pelayanan_pasien->kajian_pasiens->pasiens->no_rm }}</td>
                    <td>{{ $pelayanan_pasien->kajian_pasiens->pasiens->name }}</td>
                    <td>{{ $pelayanan_pasien->kajian_pasiens->pasiens->tanggal_lahir->translatedFormat('d F Y') }}</td>
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
@endsection
