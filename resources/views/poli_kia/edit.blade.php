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
                <li class="breadcrumb-item"><a href={{ route('poli-kia.index') }}>Pelayanan Pasien</a></li>
                <li class="breadcrumb-item"><a href={{ route('poli-kia.create') }}>Kajian Pasien</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Periksa Pasien</a></li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {{-- Start Form --}}
                    <form action={{ route('poli-kia.update', $pelayanan_pasiens->id) }} method="POST">
                        @method('put')
                        @csrf
                        {{-- Start Administrasi Form --}}
                        <div class="card-header">
                            <h3 class="card-title">Administrasi</h3>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <div class="form-group row" style="display: none">
                                    <label class="col-sm-3 col-form-label">No. Kajian Pasien</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="kajian_pasiens_id"
                                            value={{ $pelayanan_pasiens->kajian_pasiens->id }}>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">No Registrasi Pasien</label>
                                    <div class="col-sm-5">
                                        <strong>{{ $pelayanan_pasiens->kajian_pasiens->pasiens_no_rm }}</strong>
                                        {{-- <input style="background-color: #e6e6e6" type="text" disabled
                                            class="form-control" value={{ $pelayanan_pasiens->kajian_pasiens->pasiens_no_rm }}> --}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nama Pasien</label>
                                    <div class="col-sm-5">
                                        <strong>{{ $pelayanan_pasiens->kajian_pasiens->pasiens->name }}</strong>
                                        {{-- <input style="background-color: #e6e6e6" type="text" disabled
                                            class="form-control" value={{ $pelayanan_pasiens->kajian_pasiens->pasiens->name }}> --}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-5">
                                        <a class="btn btn-primary col-12"
                                            href={{ route('kajian-pasiens.show', $pelayanan_pasiens->kajian_pasiens->pasiens_no_rm) }}
                                            target="_blank">Detai Pasien</a>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Tanggal Pemeriksaan</label>
                                    <div class="col-sm-5">
                                        <input type="date" class="form-control" name="tanggal_pemeriksaan"
                                            value="{{ old('tanggal_pemeriksaan', $pelayanan_pasiens->tanggal_pemeriksaan->toDateString()) }}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nama Pemeriksa / Dokter</label>
                                    <div class="col-sm-5">
                                        <select class="form-control" name="users_id" id="noPerawatSelect">
                                            <option selected> --- Pilih Nama Pemeriksa / Dokter --- </option>
                                            @foreach ($perawats as $user)
                                                @if ($user->type == 'kia')
                                                    @if (old('users_id', $pelayanan_pasiens->users_id) == $user->id)
                                                        <option value="{{ $user->id }}" selected>{{ $user->name }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $user->id }}">{{ $user->name }}
                                                        </option>
                                                    @endif
                                                @else
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- End Administrasi Form --}}
                        <hr>
                        {{-- Start Identitas Pasien Form --}}
                        <div class="card-header">
                            <h3 class="card-title">Anamnesa</h3>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Keluhan Utama</label>
                                    <div class="col-sm-5">
                                        <div class="input-group mb-3">
                                            <textarea class="form-control" name="keluhan_utama">{{ old('keluhan_utama', $pelayanan_pasiens->keluhan_utama) }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">RPS</label>
                                    <div class="col-sm-5">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="rps"
                                                value="{{ old('rps', $pelayanan_pasiens->rps) }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">RPO</label>
                                    <div class="col-sm-5">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="rpo"
                                                value="{{ old('rpo', $pelayanan_pasiens->rpo) }}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- End Identitas Pasien Form --}}
                        <div class="card-header">
                            <h3 class="card-title">Diagnosa</h3>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Tanda Vital</label>
                                    <div class="col-sm-5">
                                        <div class="input-group mb-3">
                                            <textarea class="form-control" name="tanda_vital">{{ old('tanda_vital', $pelayanan_pasiens->tanda_vital) }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Kode ICD</label>
                                    <div class="col-sm-5">
                                        <select class="form-control" name="icds_kode_icd" id="icd">
                                            <option selected> --- Pilih ICD --- </option>
                                            @foreach ($icds as $icd)
                                                @if (old('icds_kode_icd', $pelayanan_pasiens->icds_kode_icd) == $icd->kode_icd)
                                                    <option value="{{ $icd->kode_icd }}" selected>{{ $icd->kode_icd }} - {{ $icd->nama_icd_indo }}
                                                    </option>
                                                @else
                                                    <option value="{{ $icd->kode_icd }}">{{ $icd->kode_icd }} - {{ $icd->nama_icd_indo }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Diagnosa</label>
                                    <div class="col-sm-5">
                                        <div class="input-group mb-3">
                                            <textarea class="form-control" name="diagnosa">{{ old('diagnosa', $pelayanan_pasiens->diagnosa) }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Penatalaksanaan</label>
                                    <div class="col-sm-5">
                                        <div class="input-group mb-3">
                                            <textarea class="form-control" name="penatalaksanaan">{{ old('penatalaksanaan', $pelayanan_pasiens->penatalaksanaan) }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Tindakan / Rujukan</label>
                                    <div class="col-sm-5">
                                        <div class="input-group mb-3">
                                            <textarea class="form-control" name="tindakan">{{ old('tindakan', $pelayanan_pasiens->tindakan) }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Edukasi</label>
                                    <div class="col-sm-5">
                                        <div class="input-group mb-3">
                                            <textarea class="form-control" name="edukasi">{{ old('edukasi', $pelayanan_pasiens->edukasi) }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Jenis Kasus Diagnosa</label>
                                    <div class="col-sm-5">
                                        <select class="form-control" name="jenis_kasus">
                                            <option> --- Pilih Jenis Diagnosa --- </option>
                                            <option value="Lama">Lama</option>
                                            <option value="Baru">Baru</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                    {{-- End Form --}}
                </div>
            </div>
        </div>
    </div>
@endsection
