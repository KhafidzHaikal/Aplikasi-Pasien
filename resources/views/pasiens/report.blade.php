@extends('components.pdf')

@section('body')
    <h2>LAPORAN PENDAFTARAN PASIEN</h2>
    <br>
    <p style="position:absolute;left:0">Tanggal Cetak : {{ $date }}</p>
    <p style="position:absolute;right:0">Periode Tanggal {{ $newTanggalAwal }} s/d Tanggal {{ $newTanggalAkhir }}</p>
    <table class="mt-5">
        <thead>
            <th>No</th>
            <th>No. RM</th>
            <th>Tanggal Kunjungan</th>
            <th>Nama Pasien</th>
            <th>Umur</th>
            <th>Kelamin</th>
            <th>Status Diagnosa</th>
            <th>Nama KK</th>
            <th>NIK</th>
            <th>Alamat</th>
            <th>Pembayaran</th>
            <th>Nama Petugas</th>
        </thead>
        <tbody>
            @foreach ($pasiens as $pasien)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pasien->no_rm }}</td>
                    <td>{{ $pasien->tanggal_kunjungan->translatedFormat('d F Y') }}</td>
                    <td>{{ $pasien->name }}</td>
                    <td>{{ $pasien->tanggal_lahir->translatedFormat('d F Y') }}</td>
                    <td>{{ $pasien->jenis_kelamin }}</td>
                    <td>{{ $pasien->status_kunjungan }}</td>
                    <td>{{ $pasien->nama_kk }}</td>
                    <td>{{ $pasien->nik }}</td>
                    <td>{{ $pasien->alamat }}</td>
                    <td>{{ $pasien->pembiayaan }}</td>
                    <td>{{ $pasien->users->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
