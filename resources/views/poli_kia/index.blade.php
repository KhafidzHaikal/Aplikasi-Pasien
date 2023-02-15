@extends('components.index')

@section('body')
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Aplikasi Pelayanan Pasien Poli KIA</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Pelayanan Pasien</a></li>
            </ol>
        </div>
    </div>
    <a class="btn btn-primary col-2 mb-xl-4" style="color:#ffff" href={{ route('poli-kia.create') }}><i class="bi bi-person-add mr-2"></i> Tambah Pelayanan Pasien</a>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tabel Pelayanan Pasien</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tablePasiens" class="display" style="min-width: 100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Pemeriksaan</th>
                                    <th>Nama Petugas</th>
                                    <th>Poli</th>
                                    <th>No Registrasi</th>
                                    <th>Nama</th>
                                    <th>NIK</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pelayanan_pasiens as $pelayanan_pasien)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $pelayanan_pasien->tanggal_pemeriksaan->format('d/m/Y') }}</td>
                                        <td>{{ $pelayanan_pasien->users->name }}</td>
                                        <td>{{ $pelayanan_pasien->kajian_pasiens->unit_pelayanans->name }}</td>
                                        <td>{{ $pelayanan_pasien->kajian_pasiens->pasiens->no_rm }}</td>
                                        <td>{{ $pelayanan_pasien->kajian_pasiens->pasiens->name }}</td>
                                        <td>{{ $pelayanan_pasien->kajian_pasiens->pasiens->nik }}</td>
                                        <td class="d-flex">
                                            <a href={{ route('poli-kia.edit', $pelayanan_pasien->id ) }} class="btn btn-warning mr-2"><i class="bi bi-pencil-square"></i></a>
                                            <a href={{ route('poli-kia.show', $pelayanan_pasien->id ) }} class="btn btn-info mr-2"><i class="bi bi-info-circle"></i></a>
                                            <form action={{ route('poli-kia.destroy', $pelayanan_pasien->id) }} method="POST">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-danger"><i
                                                        class="bi bi-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Pemeriksaan</th>
                                    <th>Nama Petugas</th>
                                    <th>Poli</th>
                                    <th>No Registrasi</th>
                                    <th>Nama</th>
                                    <th>NIK</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection
