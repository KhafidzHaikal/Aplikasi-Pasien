@extends('components.index')

@section('body')
    <div class="col-sm-6 p-md-0 justify-content-sm-start mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb" style="background-color:#f8f9fa">
            <li class="breadcrumb-item"><a style="color: black" href={{ route('pasiens.index') }}><i class="bi bi-arrow-left"></i> Kembali</a></li>
        </ol>
    </div>
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Detai Pasien <strong
                        style="text-decoration: underline; text-transform:uppercase">{{ $pasien->name }}</strong> </h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href={{ route('pasiens.index') }}>Pasien</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Detail Pasien</a></li>
            </ol>
        </div>
    </div>
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text d-flex align-items-start">
                <a class="btn btn-primary mr-2" style="color: #fff" href={{ route('pdf-pasien', $pasien->no_rm) }}><i class="bi bi-printer"></i> PDF</a>
                <a href={{ route('pasiens.edit', $pasien->no_rm) }} class="btn btn-warning mr-2"><i
                        class="bi bi-pencil-square"></i> Edit</a>
                <form action={{ route('pasiens.destroy', $pasien->no_rm) }} method="POST">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger"><i class="bi bi-trash"></i> Delete</button>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {{-- Start Administrasi Form --}}
                    <div class="card-header">
                        <h3 class="card-title">Detail Pasien</h3>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <div class="form-group row">
                                <p class="col-sm-3 col-form-label">No Registrasi</p>
                                <div class="col-sm-5">
                                    <strong class="col-sm-3 col-form-label">: {{ $pasien->no_rm }}</strong>
                                </div>
                            </div>
                            <div class="form-group row">
                                <p class="col-sm-3 col-form-label">Tanggal Kunjungan</p>
                                <div class="col-sm-5">
                                    <strong class="col-sm-3 col-form-label">:
                                        {{ $pasien->tanggal_kunjungan->format('d-m-Y') }}</strong>
                                </div>
                            </div>
                            <div class="form-group row">
                                <p class="col-sm-3 col-form-label">Nama Petugas</p>
                                <div class="col-sm-5">
                                    <strong class="col-sm-3 col-form-label">: {{ $pasien->users->name }}</strong>
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
                                <p class="col-sm-3 col-form-label">Nama Pasien</p>
                                <div class="col-sm-5">
                                    <strong class="col-sm-3 col-form-label">: {{ $pasien->name }}</strong>
                                </div>
                            </div>
                            <div class="form-group row">
                                <p class="col-sm-3 col-form-label">Tanggal Lahir</p>
                                <div class="col-sm-5">
                                    <strong class="col-sm-3 col-form-label">:
                                        {{ $pasien->tanggal_lahir->format('d-m-Y') }}</strong>
                                </div>
                            </div>
                            <div class="form-group row">
                                <p class="col-sm-3 col-form-label">Jenis Kelamin</p>
                                <div class="col-sm-5">
                                    <strong class="col-sm-3 col-form-label">: {{ $pasien->jenis_kelamin }}</strong>
                                </div>
                            </div>
                            <div class="form-group row">
                                <p class="col-sm-3 col-form-label">Nomor Induk Keluarga</p>
                                <div class="col-sm-5">
                                    <strong class="col-sm-3 col-form-label">: {{ $pasien->nik }}</strong>
                                </div>
                            </div>
                            <div class="form-group row">
                                <p class="col-sm-3 col-form-label">Nama Kepala Keluarga</p>
                                <div class="col-sm-5">
                                    <strong class="col-sm-3 col-form-label">: {{ $pasien->nama_kk }}</strong>
                                </div>
                            </div>
                            <div class="form-group row">
                                <p class="col-sm-3 col-form-label">Alamat</p>
                                <div class="col-sm-5">
                                    <strong class="col-sm-3 col-form-label">: {{ $pasien->alamat }}</strong>
                                </div>
                            </div>
                            <div class="form-group row">
                                <p class="col-sm-3 col-form-label">Pekerjaan</p>
                                <div class="col-sm-5">
                                    <strong class="col-sm-3 col-form-label">: {{ $pasien->pekerjaan }}</strong>
                                </div>
                            </div>
                            <div class="form-group row">
                                <p class="col-sm-3 col-form-label">Pendidikan</p>
                                <div class="col-sm-5">
                                    <strong class="col-sm-3 col-form-label">: {{ $pasien->pendidikan }}</strong>
                                </div>
                            </div>
                            <div class="form-group row">
                                <p class="col-sm-3 col-form-label">Agama</p>
                                <div class="col-sm-5">
                                    <strong class="col-sm-3 col-form-label">: {{ $pasien->agama }}</strong>
                                </div>
                            </div>
                            <div class="form-group row">
                                <p class="col-sm-3 col-form-label">Status Perkawinan</p>
                                <div class="col-sm-5">
                                    <strong class="col-sm-3 col-form-label">: {{ $pasien->status_perkawinan }}</strong>
                                </div>
                            </div>
                            <div class="form-group row">
                                <p class="col-sm-3 col-form-label">Pembiayaan</p>
                                <div class="col-sm-5">
                                    <strong class="col-sm-3 col-form-label">: {{ $pasien->pembiayaan }}</strong>
                                </div>
                            </div>
                            <div class="form-group row">
                                <p class="col-sm-3 col-form-label">Status Kunjungan</p>
                                <div class="col-sm-5">
                                    <strong class="col-sm-3 col-form-label">: {{ $pasien->status_kunjungan }}</strong>
                                </div>
                            </div>
                            <div class="form-group row">
                                <p class="col-sm-3 col-form-label">Alergi Obat</p>
                                <div class="col-sm-5">
                                    <strong class="col-sm-3 col-form-label">: {{ $pasien->alergi_obat }}</strong>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
