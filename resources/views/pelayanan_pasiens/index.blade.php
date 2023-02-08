@extends('components.index')

@section('body')
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Aplikasi Pelayanan Pasien</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Pelayanan Pasien</a></li>
            </ol>
        </div>
    </div>
    <a class="btn btn-primary col-2 mb-xl-4" style="color:#ffff" href={{ route('pelayanan-pasiens.create') }}><i class="bi bi-person-add mr-2"></i> Tambah Daftar Pasien</a>
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
                                    <th>No Registrasi</th>
                                    <th>Nama</th>
                                    <th>NIK</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($kajian_pasiens as $kajian_pasien)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $kajian_pasien->tanggal_pemeriksaan->format('d/m/Y') }}</td>
                                        <td>{{ $kajian_pasien->users->username }}</td>
                                        <td>{{ $kajian_pasien->pasiens->no_rm }}</td>
                                        <td>{{ $kajian_pasien->pasiens->name }}</td>
                                        <td>{{ $kajian_pasien->pasiens->nik }}</td>
                                        <td class="d-flex">
                                            <a href={{ route('pelayanan-pasiens.edit', $kajian_pasien->id ) }} class="btn btn-warning mr-2"><i class="bi bi-pencil-square"></i></a>
                                            <a href={{ route('pelayanan-pasiens.show', $kajian_pasien->id ) }} class="btn btn-info mr-2"><i class="bi bi-info-circle"></i></a>
                                            <form action={{ route('pelayanan-pasiens.destroy', $kajian_pasien->id) }} method="POST">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-danger"><i
                                                        class="bi bi-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach --}}
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NIK</th>
                                    <th>Nama KK</th>
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
