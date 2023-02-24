@extends('components.index')

@section('body')
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Aplikasi Pelayanan Pasien Poli Gigi</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href={{ route('bp-gigi.index') }}>Pelayanan Pasien</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Kajian Pasien</a></li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    {{-- <h4 class="card-title">Tabel Kajian Pasien <strong>Sedang Diperiksa</strong></h4> --}}
                    <h4 class="card-title">Tabel Kajian Pasien</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tablePasiens" class="display" style="min-width: 100%">
                            <thead>
                                <tr>
                                    <th>Poli</th>
                                    <th>Tanggal Pemeriksaan</th>
                                    <th>Nama Petugas</th>
                                    <th>No Registrasi</th>
                                    <th>Nama</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($kajian_pasiens->count() == 0)
                                    <div class="alert alert-danger alert-dismissible alert-alt fade show">
                                        <button type="button" class="close h-100" data-dismiss="alert"
                                            aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                        </button>
                                        <strong>Tidak Ada Pasien</strong>
                                    </div>
                                @else
                                    @foreach ($kajian_pasiens as $kajian_pasien)
                                        @if ($kajian_pasien->status == 'menunggu konfirmasi')
                                            <tr>
                                                <td>{{ $kajian_pasien->unit_pelayanans->name }}</td>
                                                <td>{{ $kajian_pasien->tanggal_pemeriksaan->format('d/m/Y') }}</td>
                                                <td>{{ $kajian_pasien->users->name }}</td>
                                                <td>{{ $kajian_pasien->pasiens->no_rm }}</td>
                                                <td>{{ $kajian_pasien->pasiens->name }}</td>
                                                <td>
                                                    @if ($kajian_pasien->status == 'menunggu konfirmasi')
                                                        <p class="badge"
                                                            style="padding: 3px; background-color:#3db5ff; color:black">
                                                            {{ $kajian_pasien->status }}</p>
                                                    @endif
                                                </td>
                                                <td class="d-flex">
                                                    {{-- <a href={{ route('bp-gigi.periksa', $kajian_pasien->pasiens_no_rm) }}
                                                        class="btn btn-warning mr-2"><i class="bi bi-search"></i></a> --}}
                                                    <form action={{ route('bp-gigi.status', $kajian_pasien->id) }}
                                                        method="POST">
                                                        @method('put')
                                                        @csrf
                                                        <input type="hidden" name="status" value="1">
                                                        <button class="btn btn-info" type="submit"><i
                                                                class="bi bi-check-square"></i> Mulai</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @elseif ($kajian_pasien->status == 'sedang diperiksa')
                                            <tr>
                                                <td>{{ $kajian_pasien->unit_pelayanans->name }}</td>
                                                <td>{{ $kajian_pasien->tanggal_pemeriksaan->format('d/m/Y') }}</td>
                                                <td>{{ $kajian_pasien->users->name }}</td>
                                                <td>{{ $kajian_pasien->pasiens->no_rm }}</td>
                                                <td>{{ $kajian_pasien->pasiens->name }}</td>
                                                <td>
                                                    @if ($kajian_pasien->status == 'sedang diperiksa')
                                                        <p class="badge"
                                                            style="padding: 3px; background-color:#FFED00; color:black">
                                                            {{ $kajian_pasien->status }}</p>
                                                    
                                                    @endif
                                                </td>
                                                <td class="d-flex">
                                                    <a href={{ route('bp-gigi.periksa', $kajian_pasien->pasiens_no_rm) }}
                                                        class="btn btn-warning mr-2"><i class="bi bi-search"></i>
                                                        Periksa</a>
                                                    </form>
                                                </td>
                                            </tr>
                                        @elseif ($kajian_pasien->status == 'sudah diperiksa')
                                            <tr>
                                                <td>{{ $kajian_pasien->unit_pelayanans->name }}</td>
                                                <td>{{ $kajian_pasien->tanggal_pemeriksaan->format('d/m/Y') }}</td>
                                                <td>{{ $kajian_pasien->users->name }}</td>
                                                <td>{{ $kajian_pasien->pasiens->no_rm }}</td>
                                                <td>{{ $kajian_pasien->pasiens->name }}</td>
                                                <td>
                                                    @if ($kajian_pasien->status == 'sudah diperiksa')
                                                        <p class="badge"
                                                            style="padding: 3px; background-color:#16FF00; color:black">
                                                            {{ $kajian_pasien->status }}</p>
                                                    @endif
                                                </td>
                                                <td class="d-flex">
                                                    <a href={{ route('bp-gigi.index') }} class="btn btn-dark"><i
                                                            class="bi bi-check-lg"></i> Selesai</a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                @endif
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Poli</th>
                                    <th>Tanggal Pemeriksaan</th>
                                    <th>Nama Petugas</th>
                                    <th>No Registrasi</th>
                                    <th>Nama</th>
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
    <script>
        const buttonSudahPeriksa = document.querySelector('#buttonSudahDiperiksa');
        const tabelSudahPeriksa = document.querySelector('#tabel-pasien-sudah-diperiksa');

        buttonSudahPeriksa.onclick = () => {
            tabelSudahPeriksa.classList.toggle('active');
            // this.classList.toggle('bi-caret-up-fill');
        }
    </script>
@endsection
