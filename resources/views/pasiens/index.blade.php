@extends('components.index')

@section('body')
    <style>
        @media (max-width: 768px) {
            .btn-primary{
                width: 100px;
            }
        }
    </style>
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
    <a class="btn btn-primary col-2 mb-xl-4" style="color:#ffff" href={{ route('pasiens.create') }}><i
            class="bi bi-person-add mr-2"></i> Tambah Pasien</a>
    <button type="button" class="btn btn-danger mb-xl-4" data-toggle="modal" data-target=".bd-example-modal-lg"><i
            class="bi bi-printer"></i>
        Print Laporan</button>
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Laporan Pasien</h5>
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
                        onclick="this.href='/print-laporan-pasien/'+document.getElementById('tanggal_awal').value+ '/' +document.getElementById('tanggal_akhir').value"
                        class="btn btn-primary">Cetak</a>
                </div>
            </div>
        </div>
    </div>
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
                                    <th>Nama Petugas</th>
                                    <th>Nama</th>
                                    <th>NIK</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pasiens as $pasien)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $pasien->no_rm }}</td>
                                        <td>{{ $pasien->tanggal_kunjungan->format('d-m-Y') }}</td>
                                        <td>{{ $pasien->users->name }}</td>
                                        <td>{{ $pasien->name }}</td>
                                        <td>{{ $pasien->nik }}</td>
                                        <td class="d-flex">
                                            <a href={{ route('pasiens.edit', $pasien->no_rm) }}
                                                class="btn btn-warning mr-2"><i class="bi bi-pencil-square"></i></a>
                                            <a href={{ route('pasiens.show', $pasien->no_rm) }} class="btn btn-info mr-2"><i
                                                    class="bi bi-info-circle"></i></a>
                                            @if (!$pasien->kajian_pasiens->count() > 0)
                                                <form action={{ route('pasiens.destroy', $pasien->no_rm) }} method="POST">
                                                    @method('delete')
                                                    @csrf
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button type="submit" class="btn btn-danger show-alert-delete-box"
                                                        data-toggle="tooltip" title='Delete'><i
                                                            class="bi bi-trash"></i></button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>No Registrasi</th>
                                    <th>Tanggal Kunjungan</th>
                                    <th>Nama Petugas</th>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <script type="text/javascript">
        $('.show-alert-delete-box').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: "Anda Yakin Menghapus Pasien?",
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
