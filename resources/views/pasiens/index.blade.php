@extends('components.index')

@section('body')
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Pasien</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Pasien</a></li>
            </ol>
        </div>
    </div>
    <a class="btn btn-primary col-2 mb-xl-4" style="color:#ffff" href={{ route('pasiens.create') }}><i class="bi bi-person-add mr-2"></i> Tambah Pasien</a>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tabel User</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tablePasiens" class="display" style="min-width: 100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Registrasi</th>
                                    <th>Tanggal Kunjungan</th>
                                    <th>Nama</th>
                                    <th>NIK</th>
                                    <th>Nama KK</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pasiens as $pasien)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $pasien->no_rm }}</td>
                                        <td>{{ $pasien->tanggal_kunjungan->format('d/m/Y') }}</td>
                                        <td>{{ $pasien->name }}</td>
                                        <td>{{ $pasien->nik }}</td>
                                        <td>{{ $pasien->nama_kk }}</td>
                                        <td class="d-flex">
                                            <a href={{ route('pasiens.edit', $pasien->no_rm ) }} class="btn btn-warning mr-2"><i class="bi bi-pencil-square"></i></a>
                                            <a href={{ route('pasiens.show', $pasien->no_rm ) }} class="btn btn-info mr-2"><i class="bi bi-info-circle"></i></a>
                                            <form action={{ route('pasiens.destroy', $pasien->no_rm) }} method="POST">
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
