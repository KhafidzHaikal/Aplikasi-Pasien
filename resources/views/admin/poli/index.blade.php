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
    <button type="button" class="btn btn-danger mb-xl-4" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="bi bi-printer"></i>
        Print Laporan</button>
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Laporan BP</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label class="col-sm-3 col-form-label"><strong>Pilih Tanggal Laporan</strong></label>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tanggal Awal</label>
                            <div class="col-sm-5">
                                <input type="date" class="form-control" id="tanggal_awal" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tanggal Akhir</label>
                            <div class="col-sm-5">
                                <input type="date" class="form-control" id="tanggal_akhir" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a target="_blank" onclick="this.href='/print-laporan-poli/'+document.getElementById('tanggal_awal').value+ '/' +document.getElementById('tanggal_akhir').value" class="btn btn-primary">Cetak</a>
                </div>
            </div>
        </div>
    </div>
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
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pelayanan_pasiens as $pelayanan_pasien)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $pelayanan_pasien->tanggal_pemeriksaan->format('d-m-Y') }}</td>
                                        <td>{{ $pelayanan_pasien->users->name }}</td>
                                        <td>{{ $pelayanan_pasien->unit_pelayanans->name }}</td>
                                        <td>{{ $pelayanan_pasien->kajian_pasiens->pasiens->no_rm }}</td>
                                        <td>{{ $pelayanan_pasien->kajian_pasiens->pasiens->name }}</td>
                                        <td>{{ $pelayanan_pasien->kajian_pasiens->pasiens->nik }}</td>
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
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
