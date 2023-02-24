@extends('components.index')

@section('body')
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Edit Asuhan Keperawatan</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href={{ route('askep.index') }}>Pelayanan Pasien</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Pasien</a></li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {{-- Start Form --}}
                    <form action={{ route('askep.update', $askep->id) }} method="POST">
                        @method('put')
                        @csrf
                        {{-- Start Administrasi Form --}}
                        <div class="card-header">
                            <h3 class="card-title">Administrasi</h3>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <div class="form-group row" style="display: none">
                                    <label class="col-sm-3 col-form-label">No. Pelayanan Pasien</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="pelayanan_pasiens_id"
                                            value={{ $askep->pelayanan_pasiens_id }}>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">No Registrasi Pasien</label>
                                    <div class="col-sm-5">
                                        <strong>{{ $askep->pelayanan_pasiens->kajian_pasiens->pasiens_no_rm }}</strong>
                                        {{-- <input style="background-color: #e6e6e6" type="text" disabled
                                            class="form-control" value={{ $kajian_pasien->pasiens_no_rm }}> --}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nama Pasien</label>
                                    <div class="col-sm-5">
                                        <strong>{{ $askep->pelayanan_pasiens->kajian_pasiens->pasiens->name }}</strong>
                                        {{-- <input style="background-color: #e6e6e6" type="text" disabled
                                            class="form-control" value={{ $kajian_pasien->pasiens->name }}> --}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-5">
                                        <a class="btn btn-primary col-12" href={{ route('askep.detail', $askep->pelayanan_pasiens_id) }}
                                            target="_blank">Detail Pasien</a>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Tanggal Pengkajian</label>
                                    <div class="col-sm-5">
                                        <input type="date" class="form-control" name="tanggal_pengkajian"
                                            value="{{ old('tanggal_pengkajian', $askep->tanggal_pengkajian->toDateString()) }}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nama Petugas</label>
                                    <div class="col-sm-5">
                                        <select class="form-control" name="users_id" id="noPerawatSelect" required>
                                            <option> --- Pilih Nama Petugas --- </option>
                                            @foreach ($users as $user)
                                                @if ($user->type == 'nurse')
                                                    @if (old('users_id', $askep->users_id) == $user->id)
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
                            <h3 class="card-title">Hasil Pengkajian</h3>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Data Obyektif</label>
                                    <div class="col-sm-5">
                                        <div class="input-group mb-3">
                                            <textarea class="form-control" name="data_obyektif">{{ old('data_obyektif', $askep->data_obyektif) }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Data Subyektif</label>
                                    <div class="col-sm-5">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="data_subyektif"
                                                value="{{ old('data_subyektif', $askep->data_subyektif) }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Hasil Pemeriksaan Penunjang</label>
                                    <div class="col-sm-5">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="hasil_penunjang"
                                                value="{{ old('hasil_penunjang', $askep->hasil_penunjang) }}" required>
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
                                    <label class="col-sm-3 col-form-label">Kode Diagnosa</label>
                                    <div class="col-sm-5">
                                        <select class="form-control" name="diagnosas_kode_sdki" id="icd" required>
                                            <option selected> --- Pilih Diagnosa --- </option>
                                            @foreach ($diagnosas as $diagnosa)
                                                @if (old('diagnosas_kode_sdki', $askep->diagnosas_kode_sdki) == $diagnosa->kode_sdki)
                                                    <option value="{{ $diagnosa->kode_sdki }}" selected>{{ $diagnosa->kode_sdki }} -
                                                        {{ $diagnosa->nama_sdki }}
                                                    </option>
                                                @else
                                                    <option value="{{ $diagnosa->kode_sdki }}">{{ $diagnosa->kode_sdki }} -
                                                        {{ $diagnosa->nama_sdki }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Tujuan</label>
                                    <div class="col-sm-5">
                                        <div class="input-group mb-3">
                                            <textarea class="form-control" name="tujuan">{{ old('tujuan', $askep->tujuan) }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Intervensi</label>
                                    <div class="col-sm-5">
                                        <div class="input-group mb-3">
                                            <textarea class="form-control" name="intervensi">{{ old('intervensi', $askep->intervensi) }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Implementasi</label>
                                    <div class="col-sm-5">
                                        <div class="input-group mb-3">
                                            <textarea class="form-control" name="implementasi">{{ old('implementasi', $askep->implementasi) }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-header">
                            <h3 class="card-title">Evaluasi</h3>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Subyektif</label>
                                    <div class="col-sm-5">
                                        <div class="input-group mb-3">
                                            <textarea class="form-control" name="subyektif" required>{{ old('subyektif', $askep->subyektif) }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Obyektif</label>
                                    <div class="col-sm-5">
                                        <div class="input-group mb-3">
                                            <textarea type="text" class="form-control" name="obyektif" required>{{ old('obyektif', $askep->obyektif) }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Assesment</label>
                                    <div class="col-sm-5">
                                        <div class="input-group mb-3">
                                            <textarea type="text" class="form-control" name="assesment" required>{{ old('assesment', $askep->assesment) }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Planning</label>
                                    <div class="col-sm-5">
                                        <div class="input-group mb-3">
                                            <textarea type="text" class="form-control" name="planning" required>{{ old('planning', $askep->planning) }}</textarea>
                                        </div>
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
