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
                <li class="breadcrumb-item"><a href={{ route('admin-poli-mtbs.index') }}>Pelayanan Pasien</a></li>
                <li class="breadcrumb-item"><a href={{ route('admin-poli-mtbs.create') }}>Kajian Pasien</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Periksa Pasien</a></li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {{-- Start Form --}}
                    <form action={{ route('admin-poli-mtbs.store', $kajian_pasien->pasiens_no_rm) }} method="POST">
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
                                            value={{ $kajian_pasien->id }}>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">No Registrasi Pasien</label>
                                    <div class="col-sm-5">
                                        <strong>{{ $kajian_pasien->pasiens_no_rm }}</strong>
                                        {{-- <input style="background-color: #e6e6e6" type="text" disabled
                                            class="form-control" value={{ $kajian_pasien->pasiens_no_rm }}> --}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nama Pasien</label>
                                    <div class="col-sm-5">
                                        <strong>{{ $kajian_pasien->pasiens->name }}</strong>
                                        {{-- <input style="background-color: #e6e6e6" type="text" disabled
                                            class="form-control" value={{ $kajian_pasien->pasiens->name }}> --}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-5">
                                        <a class="btn btn-primary col-12"
                                            href={{ route('kajian-pasiens.show', $kajian_pasien->pasiens_no_rm) }}
                                            target="_blank">Detai Pasien</a>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Tanggal Pemeriksaan</label>
                                    <div class="col-sm-5">
                                        <input type="date" class="form-control" name="tanggal_pemeriksaan"
                                            value="{{ old('tanggal_pemeriksaan') }}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nama Pemeriksa / Dokter</label>
                                    <div class="col-sm-5">
                                        <select class="form-control" name="users_id" id="noPerawatSelect">
                                            <option selected> --- Pilih Nama Pemeriksa / Dokter --- </option>
                                            @foreach ($perawats as $perawat)
                                                @if ($perawat->type == 'mtbs')
                                                    @if (old('users_id') == $perawat->id)
                                                        <option value="{{ $perawat->id }}" selected>{{ $perawat->name }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $perawat->id }}">{{ $perawat->name }}
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
                                            <textarea class="form-control" name="keluhan_utama">{{ old('keluhan_utama') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Riwayat Penyakit Sekarang</label>
                                    <div class="col-sm-5">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="rps"
                                                value="{{ old('rps') }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Riwayat Penyakit Dulu</label>
                                    <div class="col-sm-5">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="rpo"
                                                value="{{ old('rpo') }}" required>
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
                                    <label class="col-sm-3 col-form-label">Kode ICD</label>
                                    <div class="col-sm-5">
                                        <select class="form-control" name="icds_kode_icd" id="icd">
                                            <option selected> --- Pilih ICD --- </option>
                                            @foreach ($icds as $icd)
                                                @if (old('icds_kode_icd') === $icd->kode_icd)
                                                    <option value="{{ $icd->kode_icd }}" selected>{{ $icd->kode_icd }} - {{ $icd->nama_icd }}
                                                    </option>
                                                @else
                                                    <option value="{{ $icd->kode_icd }}">{{ $icd->kode_icd }} - {{ $icd->nama_icd }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Terapi / Pengobatan</label>
                                    <div class="col-sm-5">
                                        <div class="input-group mb-3">
                                            <textarea class="form-control" name="penatalaksanaan">{{ old('penatalaksanaan') }}</textarea>
                                        </div>
                                        <p style="color: red">Obat lebih dari satu gunakan koma (,)</p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Tindakan / Rujukan</label>
                                    <div class="col-sm-5">
                                        <div class="input-group mb-3">
                                            <textarea class="form-control" name="tindakan">{{ old('tindakan') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Edukasi</label>
                                    <div class="col-sm-5">
                                        <div class="input-group mb-3">
                                            <textarea class="form-control" name="edukasi">{{ old('edukasi') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Status Diagnosa</label>
                                    <div class="col-sm-5">
                                        <select class="form-control" name="jenis_kasus" required>
                                            <option> --- Pilih Status Diagnosa --- </option>
                                            <option value="Lama"
                                                @if (old('jenis_kasus') == 'Lama') {{ 'selected' }} @endif>Lama</option>
                                            <option value="Baru"
                                                @if (old('jenis_kasus') == 'Baru') {{ 'selected' }} @endif>Baru</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Unit Pelayanan</label>
                                    <div class="col-sm-5">
                                        <select class="form-control" name="unit_pelayanans_id">
                                            <option value={{ $kajian_pasien->unit_pelayanans->id }}>
                                                {{ $kajian_pasien->unit_pelayanans->name }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row" hidden>
                                    <label class="col-sm-3 col-form-label">Farmasi</label>
                                    <div class="col-sm-5">
                                        <select class="form-control" name="status">
                                            <option value="0" selected>Kirim</option>
                                        </select>
                                        <select class="form-control" name="statusAskep">
                                            <option value="0" selected>Askep</option>
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
