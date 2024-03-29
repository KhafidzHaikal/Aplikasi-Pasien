@extends('components.index')

@section('body')
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Aplikasi Kajian Pasien</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Kajian Pasien</a></li>
            </ol>
        </div>
    </div>
    <a class="btn btn-primary col-2 mb-xl-4" style="color:#ffff" href={{ route('kajian-pasiens.create') }}><i
            class="bi bi-person-add mr-2"></i> Tambah Kajian Pasien</a>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tabel Kajian Pasien</h4>
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
                                    {{-- <th>NIK</th> --}}
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kajian_pasiens as $kajian_pasien)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $kajian_pasien->tanggal_pemeriksaan->translatedFormat('d F Y') }}</td>
                                        <td>{{ $kajian_pasien->users->name }}</td>
                                        <td>{{ $kajian_pasien->unit_pelayanans->name }}</td>
                                        <td>{{ $kajian_pasien->pasiens->no_rm }}</td>
                                        <td>{{ $kajian_pasien->pasiens->name }}</td>
                                        {{-- <td>{{ $kajian_pasien->pasiens->nik }}</td> --}}
                                        <td>
                                            @if ($kajian_pasien->status == 'sedang diperiksa')
                                                <p class="badge"
                                                    style="padding: 3px; background-color:#FFED00; color:black">
                                                    {{ $kajian_pasien->status }}</p>
                                            @elseif ($kajian_pasien->status == 'sudah diperiksa')
                                                <p class="badge"
                                                    style="padding: 3px; background-color:#16FF00; color:black">
                                                    {{ $kajian_pasien->status }}</p>
                                            @elseif ($kajian_pasien->status == 'menunggu konfirmasi')
                                                <p class="badge"
                                                    style="padding: 3px; background-color:#3db5ff; color:black">
                                                    {{ $kajian_pasien->status }}</p>
                                            @endif
                                        </td>
                                        <td class="d-flex">
                                            <a href={{ route('kajian-pasiens.edit', $kajian_pasien->pasiens_no_rm) }}
                                                class="btn btn-warning mr-2"><i class="bi bi-pencil-square"></i></a>
                                            <a href={{ route('kajian-pasiens.show', $kajian_pasien->pasiens_no_rm) }}
                                                class="btn btn-info mr-2"><i class="bi bi-info-circle"></i></a>
                                            <form action={{ route('kajian-pasiens.destroy', $kajian_pasien->id) }}
                                                method="POST">
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
                                    <th>Tanggal Pemeriksaan</th>
                                    <th>Nama Petugas</th>
                                    <th>Poli</th>
                                    <th>No Registrasi</th>
                                    <th>Nama</th>
                                    {{-- <th>NIK</th> --}}
                                    <th>Status</th>
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
