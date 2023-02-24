@extends('components.index')

@section('body')
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Aplikasi Asuhan Keperawatan</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href={{ route('askep.index') }}>Pelayanan Pasien</a></li>
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
                                    <th>Status Askep</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($pelayanan_pasiens->count() == 0)
                                    <div class="alert alert-danger alert-dismissible alert-alt fade show">
                                        <button type="button" class="close h-100" data-dismiss="alert"
                                            aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                        </button>
                                        <strong>Kosong!  </strong>Tidak Ada Pasien
                                    </div>
                                @else
                                    @foreach ($pelayanan_pasiens as $pelayanan_pasien)
                                        @if ($pelayanan_pasien->statusAskep == 'belum buat')
                                            <tr>
                                                <td>{{ $pelayanan_pasien->unit_pelayanans->name }}</td>
                                                <td>{{ $pelayanan_pasien->tanggal_pemeriksaan->format('d-m-Y') }}</td>
                                                <td>{{ $pelayanan_pasien->users->name }}</td>
                                                <td>{{ $pelayanan_pasien->kajian_pasiens->pasiens->no_rm }}</td>
                                                <td>{{ $pelayanan_pasien->kajian_pasiens->pasiens->name }}</td>
                                                <td>
                                                    @if ($pelayanan_pasien->statusAskep == 'belum buat')
                                                        <p class="badge badge-warning" style="padding: 3px; color:black">
                                                            {{ $pelayanan_pasien->statusAskep }}</p>
                                                    @endif
                                                </td>
                                                <td class="d-flex">
                                                    <a class="btn btn-info"
                                                        href={{ route('askep.periksa', $pelayanan_pasien->id) }}><i
                                                            class="bi bi-check-square"></i> Mulai</a>
                                                </td>
                                            </tr>
                                        @elseif ($pelayanan_pasien->statusAskep == 'sudah buat')
                                            <tr>
                                                <td>{{ $pelayanan_pasien->unit_pelayanans->name }}</td>
                                                <td>{{ $pelayanan_pasien->tanggal_pemeriksaan->format('d-m-Y') }}</td>
                                                <td>{{ $pelayanan_pasien->users->name }}</td>
                                                <td>{{ $pelayanan_pasien->kajian_pasiens->pasiens->no_rm }}</td>
                                                <td>{{ $pelayanan_pasien->kajian_pasiens->pasiens->name }}</td>
                                                <td>
                                                    @if ($pelayanan_pasien->statusAskep == 'sudah buat')
                                                        <p class="badge badge-success" style="padding: 3px; color:black">
                                                            {{ $pelayanan_pasien->statusAskep }}</p>
                                                    @endif
                                                </td>
                                                <td class="d-flex">
                                                    <a href={{ route('askep.index') }} class="btn btn-danger"><i
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
                                    <th>Status Askep</th>
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
