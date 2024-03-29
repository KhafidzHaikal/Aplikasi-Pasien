@extends('components.index')

@section('body')
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Aplikasi Pelayanan Pasien Farmasi</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Pelayanan Pasien</a></li>
            </ol>
        </div>
    </div>
    <a class="btn btn-primary col-2 mb-xl-4" style="color:#ffff" href={{ route('farmasi.create') }}><i
            class="bi bi-person-add mr-2"></i> Tambah Pasien</a>
    <button type="button" class="btn btn-danger mb-xl-4" data-toggle="modal" data-target=".bd-example-modal-lg"><i
            class="bi bi-printer"></i>
        Print Laporan</button>
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Laporan Farmasi</h5>
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
                    <a target="_blank"
                        onclick="this.href='/print-laporan-farmasi/'+document.getElementById('tanggal_awal').value+ '/' +document.getElementById('tanggal_akhir').value"
                        class="btn btn-primary">Cetak</a>
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
                                    <th>Nama Petugas</th>
                                    <th>Poli</th>
                                    <th>No Registrasi</th>
                                    <th>Nama</th>
                                    <th>NIK</th>
                                    <th>Obat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($farmasis as $farmasi)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $farmasi->pelayanan_pasiens->users->name }}</td>
                                        <td>{{ $farmasi->pelayanan_pasiens->unit_pelayanans->name }}</td>
                                        <td>{{ $farmasi->pelayanan_pasiens->kajian_pasiens->pasiens->no_rm }}</td>
                                        <td>{{ $farmasi->pelayanan_pasiens->kajian_pasiens->pasiens->name }}</td>
                                        <td>{{ $farmasi->pelayanan_pasiens->kajian_pasiens->pasiens->nik }}</td>
                                        <td>
                                            @php
                                                $obat = json_decode($farmasi->obats_id);
                                            @endphp
                                            @if (is_array($obat) || is_object($obat))
                                                @foreach ($obat as $item)
                                                    {{ $item }}, 
                                                @endforeach
                                            @else
                                                {{ $farmasi->obats->name }}
                                            @endif
                                        </td>
                                        <td class="d-flex">
                                            <a href={{ route('farmasi.show', $farmasi->id) }}
                                                class="btn btn-info mr-2"><i class="bi bi-info-circle"></i></a>
                                            <form action={{ route('farmasi.destroy', $farmasi->id) }} method="POST">
                                                @method('delete')
                                                @csrf
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button type="submit" class="btn btn-danger show-alert-delete-box"
                                                    data-toggle="tooltip" title='Delete'><i
                                                        class="bi bi-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Petugas</th>
                                    <th>Poli</th>
                                    <th>No Registrasi</th>
                                    <th>Nama</th>
                                    <th>NIK</th>
                                    <th>Obat</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <script type="text/javascript">
        $('.show-alert-delete-box').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: "Anda Yakin Menghapus Data?",
                text: "Data Akan Dihapus Secara Permanen",
                icon: "warning",
                type: "warning",
                buttons: ["Cancel", "Yes"],
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Data Terhapus'
            }).then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
        });
    </script>
@endsection
