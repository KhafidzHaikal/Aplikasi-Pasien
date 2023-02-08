@extends('components.index')

@section('body')
    <div class="col-sm-6 p-md-0 justify-content-sm-start mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb" style="background-color:#f8f9fa">
            <li class="breadcrumb-item"><a style="color: black" href={{ route('kajian-pasiens.index') }}><i
                        class="bi bi-arrow-left"></i> Kembali</a></li>
        </ol>
    </div>
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Detai Pasien <strong
                        style="text-decoration: underline; text-transform:uppercase">{{ $kajian_pasiens->pasiens->name }}</strong>
                </h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href={{ route('kajian-pasiens.index') }}>Pasien</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Detail Pasien</a></li>
            </ol>
        </div>
    </div>
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text d-flex align-items-start">
                <a class="btn btn-primary mr-2" style="color: #fff" href={{ route('pdf-kajian-pasien', $kajian_pasiens->id) }}><i
                        class="bi bi-printer"></i> PDF</a>
                <a href={{ route('kajian-pasiens.edit', $kajian_pasiens->id) }} class="btn btn-warning mr-2"><i
                        class="bi bi-pencil-square"></i> Edit</a>
                <form action={{ route('kajian-pasiens.destroy', $kajian_pasiens->id) }} method="POST">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger"><i class="bi bi-trash"></i> Delete</button>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        {{-- ---------- Row Left ------------- --}}
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    {{-- Start Administrasi Form --}}
                    <div class="card-header">
                        <h3 class="card-title">Detail Pasien</h3>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <div class="form-group row">
                                <p class="col-sm-5 col-form-label">No Registrasi</p>
                                <div class="col-sm-5">
                                    <strong class="col-sm-3 col-form-label">: {{ $kajian_pasiens->pasiens->no_rm }}</strong>
                                </div>
                            </div>
                            <div class="form-group row">
                                <p class="col-sm-5 col-form-label">Tanggal Pemeriksaan</p>
                                <div class="col-sm-5">
                                    <strong class="col-sm-3 col-form-label">:
                                        {{ $kajian_pasiens->tanggal_pemeriksaan->format('d-m-Y') }}</strong>
                                </div>
                            </div>
                            <div class="form-group row">
                                <p class="col-sm-5 col-form-label">Nama Petugas</p>
                                <div class="col-sm-5">
                                    <strong class="col-sm-3 col-form-label">:
                                        {{ $kajian_pasiens->users->username }}</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- End Administrasi Form --}}
                    <hr>
                    {{-- Start Identitas Pasien Form --}}
                    <div class="card-header">
                        <h3 class="card-title">Identitas Pasien</h3>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <div class="form-group row">
                                <p class="col-sm-5 col-form-label">Nama Pasien</p>
                                <div class="col-sm-5">
                                    <strong class="col-sm-3 col-form-label">: {{ $kajian_pasiens->pasiens->name }}</strong>
                                </div>
                            </div>
                            <div class="form-group row">
                                <p class="col-sm-5 col-form-label">Tanggal Lahir</p>
                                <div class="col-sm-5">
                                    <strong class="col-sm-3 col-form-label">:
                                        {{ $kajian_pasiens->pasiens->tanggal_lahir->format('d-m-Y') }}</strong>
                                </div>
                            </div>
                            <div class="form-group row">
                                <p class="col-sm-5 col-form-label">Jenis Kelamin</p>
                                <div class="col-sm-5">
                                    <strong class="col-sm-3 col-form-label">:
                                        {{ $kajian_pasiens->pasiens->jenis_kelamin }}</strong>
                                </div>
                            </div>
                            <div class="form-group row">
                                <p class="col-sm-5 col-form-label">Nomor Induk Keluarga</p>
                                <div class="col-sm-5">
                                    <strong class="col-sm-3 col-form-label">: {{ $kajian_pasiens->pasiens->nik }}</strong>
                                </div>
                            </div>
                            <div class="form-group row">
                                <p class="col-sm-5 col-form-label">Nama Kepala Keluarga</p>
                                <div class="col-sm-5">
                                    <strong class="col-sm-3 col-form-label">:
                                        {{ $kajian_pasiens->pasiens->nama_kk }}</strong>
                                </div>
                            </div>
                            <div class="form-group row">
                                <p class="col-sm-5 col-form-label">Alamat</p>
                                <div class="col-sm-5">
                                    <strong class="col-sm-3 col-form-label">:
                                        {{ $kajian_pasiens->pasiens->alamat }}</strong>
                                </div>
                            </div>
                            <div class="form-group row">
                                <p class="col-sm-5 col-form-label">Pekerjaan</p>
                                <div class="col-sm-5">
                                    <strong class="col-sm-3 col-form-label">:
                                        {{ $kajian_pasiens->pasiens->pekerjaan }}</strong>
                                </div>
                            </div>
                            <div class="form-group row">
                                <p class="col-sm-5 col-form-label">Pendidikan</p>
                                <div class="col-sm-5">
                                    <strong class="col-sm-3 col-form-label">:
                                        {{ $kajian_pasiens->pasiens->pendidikan }}</strong>
                                </div>
                            </div>
                            <div class="form-group row">
                                <p class="col-sm-5 col-form-label">Agama</p>
                                <div class="col-sm-5">
                                    <strong class="col-sm-3 col-form-label">:
                                        {{ $kajian_pasiens->pasiens->agama }}</strong>
                                </div>
                            </div>
                            <div class="form-group row">
                                <p class="col-sm-5 col-form-label">Status Perkawinan</p>
                                <div class="col-sm-5">
                                    <strong class="col-sm-3 col-form-label">:
                                        {{ $kajian_pasiens->pasiens->status_perkawinan }}</strong>
                                </div>
                            </div>
                            <div class="form-group row">
                                <p class="col-sm-5 col-form-label">Pembiayaan</p>
                                <div class="col-sm-5">
                                    <strong class="col-sm-3 col-form-label">:
                                        {{ $kajian_pasiens->pasiens->pembiayaan }}</strong>
                                </div>
                            </div>
                            <div class="form-group row">
                                <p class="col-sm-5 col-form-label">Status Kunjungan</p>
                                <div class="col-sm-5">
                                    <strong class="col-sm-3 col-form-label">:
                                        {{ $kajian_pasiens->pasiens->status_kunjungan }}</strong>
                                </div>
                            </div>
                            <div class="form-group row">
                                <p class="col-sm-5 col-form-label">Alergi Obat</p>
                                <div class="col-sm-5">
                                    <strong class="col-sm-3 col-form-label">:
                                        {{ $kajian_pasiens->pasiens->alergi_obat }}</strong>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        {{-- ---------- Row Left ------------- --}}
        {{-- ---------- Row Right ------------- --}}
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    {{-- Start Administrasi Form --}}
                    <div class="card-header">
                        <h3 class="card-title">Hasil Pemeriksaan Pasien</h3>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <div class="form-group row">
                                <p class="col-sm-5 col-form-label">Tensi</p>
                                <div class="col-sm-5">
                                    <strong class="col-sm-3 col-form-label">: {{ $kajian_pasiens->tensi }} </strong>mm/Hg
                                </div>
                            </div>
                            <div class="form-group row">
                                <p class="col-sm-5 col-form-label">Nadi</p>
                                <div class="col-sm-5">
                                    <strong class="col-sm-3 col-form-label">: {{ $kajian_pasiens->nadi }} </strong>x/menit
                                </div>
                            </div>
                            <div class="form-group row">
                                <p class="col-sm-5 col-form-label">Resp</p>
                                <div class="col-sm-5">
                                    <strong class="col-sm-3 col-form-label">: {{ $kajian_pasiens->resp }} </strong>x/menit
                                </div>
                            </div>
                            <div class="form-group row">
                                <p class="col-sm-5 col-form-label">Suhu</p>
                                <div class="col-sm-5">
                                    <strong class="col-sm-3 col-form-label">: {{ $kajian_pasiens->suhu }}
                                    </strong><sup>o</sup>C
                                </div>
                            </div>
                            <div class="form-group row">
                                <p class="col-sm-5 col-form-label">Berat Badan</p>
                                <div class="col-sm-5">
                                    <strong class="col-sm-3 col-form-label">: {{ $kajian_pasiens->bb }} </strong>Kg
                                </div>
                            </div>
                            <div class="form-group row">
                                <p class="col-sm-5 col-form-label">Tinggu Badan</p>
                                <div class="col-sm-5">
                                    <strong class="col-sm-3 col-form-label">: {{ $kajian_pasiens->tb }} </strong>cm
                                </div>
                            </div>
                            <div class="form-group row">
                                <p class="col-sm-5 col-form-label">Indeks Massa Tubuh (IMT)</p>
                                <div class="col-sm-5">
                                    <strong class="col-sm-3 col-form-label">: {{ $kajian_pasiens->imt }}
                                    </strong>Kg/M<sup>2</sup>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- End Administrasi Form --}}

                </div>
            </div>
        </div>
        {{-- ---------- Row Right ------------- --}}
    </div>
@endsection
