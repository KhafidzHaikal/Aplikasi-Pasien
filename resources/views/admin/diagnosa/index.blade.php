@extends('components.index')

@section('body')
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Diagnosa</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Layanan Diagnosa</a></li>
            </ol>
        </div>
    </div>
    <a class="btn btn-primary col-2 mb-xl-4" style="color:#ffff" href={{ route('admin-diagnosa.create') }}><i
            class="bi bi-person-add mr-2"></i> Tambah Diagnosa</a>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tabel Diagnosa</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tablePasiens" class="display" style="min-width: 100%">
                            <thead>
                                <tr>
                                    <th>Kode Diagnosa</th>
                                    <th>Nama Diagnosa</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($diagnosas as $diagnosa)
                                    <tr>
                                        <td>{{ $diagnosa->kode_sdki }}</td>
                                        <td>{{ $diagnosa->nama_sdki }}</td>
                                        <td class="d-flex">
                                            <a href={{ route('admin-diagnosa.edit', $diagnosa->kode_sdki) }} class="btn btn-warning mr-2"><i
                                                    class="bi bi-pencil-square"></i></a>
                                            {{-- @if (!$diagnosa->farmasi_pasiens()->getChild()->count() > 0) --}}
                                                {{-- <form action={{ route('admin-diagnosa.destroy', $diagnosa->kode_sdki) }} method="POST">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                                </form> --}}
                                            {{-- @endif --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Kode Diagnosa</th>
                                    <th>Nama Diagnosa</th>
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
