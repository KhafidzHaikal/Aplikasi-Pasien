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
                <li class="breadcrumb-item"><a href={{ route('admin-farmasi.index') }}>Pelayanan Pasien</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Pelayanan Pasien</a></li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    {{-- <h4 class="card-title">Tabel Pelayanan Pasien <strong>pencarian obat</strong></h4> --}}
                    <h4 class="card-title">Tabel Pelayanan Pasien</h4>
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
                                @if ($pelayanan_pasiens->count() == 0)
                                    <tr>
                                        <td colspan="8"><strong style="color: rgb(255, 0, 0)">Tidak Ada Pasien</strong>
                                        </td>
                                    </tr>
                                @else
                                    @foreach ($pelayanan_pasiens as $pelayanan_pasien)
                                        @if ($pelayanan_pasien->status == 'menunggu konfirmasi')
                                            <tr>
                                                <td>{{ $pelayanan_pasien->unit_pelayanans->name }}</td>
                                                <td>{{ $pelayanan_pasien->tanggal_pemeriksaan->format('d-m-Y') }}</td>
                                                <td>{{ $pelayanan_pasien->users->name }}</td>
                                                <td>{{ $pelayanan_pasien->kajian_pasiens->pasiens->no_rm }}</td>
                                                <td>{{ $pelayanan_pasien->kajian_pasiens->pasiens->name }}</td>
                                                <td>
                                                    @if ($pelayanan_pasien->status == 'menunggu konfirmasi')
                                                        <p class="badge"
                                                            style="padding: 3px; background-color:#3db5ff; color:black">
                                                            {{ $pelayanan_pasien->status }}</p>
                                                    @endif
                                                </td>
                                                <td class="d-flex">
                                                    {{-- <a href={{ route('admin-farmasi.periksa', $pelayanan_pasien->id) }}
                                                        class="badge badge-warning mr-2"><i class="bi bi-search"></i></a> --}}
                                                    <form action={{ route('admin-farmasi.status', $pelayanan_pasien->id) }}
                                                        method="POST">
                                                        @method('put')
                                                        @csrf
                                                        <input type="hidden" name="status" value="1">
                                                        <button class="btn btn-info" type="submit"><i
                                                                class="bi bi-check-square"></i> Mulai</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @elseif ($pelayanan_pasien->status == 'pencarian obat')
                                            <tr>
                                                <td>{{ $pelayanan_pasien->unit_pelayanans->name }}</td>
                                                <td>{{ $pelayanan_pasien->tanggal_pemeriksaan->format('d-m-Y') }}</td>
                                                <td>{{ $pelayanan_pasien->users->name }}</td>
                                                <td>{{ $pelayanan_pasien->kajian_pasiens->pasiens->no_rm }}</td>
                                                <td>{{ $pelayanan_pasien->kajian_pasiens->pasiens->name }}</td>
                                                <td>
                                                    @if ($pelayanan_pasien->status == 'pencarian obat')
                                                        <p class="badge"
                                                            style="padding: 3px; background-color:#FFED00; color:black">
                                                            {{ $pelayanan_pasien->status }}</p>
                                                    @endif
                                                </td>
                                                <td class="d-flex">
                                                    <a href={{ route('admin-farmasi.periksa', $pelayanan_pasien->id) }}
                                                        class="btn btn-warning mr-2"><i class="bi bi-search"></i> Layani</a>
                                                    <form action={{ route('admin-farmasi.status', $pelayanan_pasien->id) }}
                                                        method="POST">
                                                        @method('put')
                                                        @csrf
                                                        <input type="hidden" name="status" value="2">
                                                        <button class="btn btn-danger" type="submit"><i
                                                                class="bi bi-check-square"></i> Selesai</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @elseif ($pelayanan_pasien->status == 'sudah ditebus')
                                            <tr>
                                                <td>{{ $pelayanan_pasien->unit_pelayanans->name }}</td>
                                                <td>{{ $pelayanan_pasien->tanggal_pemeriksaan->format('d-m-Y') }}</td>
                                                <td>{{ $pelayanan_pasien->users->name }}</td>
                                                <td>{{ $pelayanan_pasien->kajian_pasiens->pasiens->no_rm }}</td>
                                                <td>{{ $pelayanan_pasien->kajian_pasiens->pasiens->name }}</td>
                                                <td>
                                                    @if ($pelayanan_pasien->status == 'sudah ditebus')
                                                        <p class="badge"
                                                            style="padding: 3px; background-color:#16FF00; color:black">
                                                            {{ $pelayanan_pasien->status }}</p>
                                                    @endif
                                                </td>
                                                <td class="d-flex">
                                                    <a href={{ route('admin-farmasi.index') }} class="btn btn-danger"><i
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
