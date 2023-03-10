@extends('components.index')

@section('body')
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Tambah Pelayanan Pasien</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href={{ route('pelayanan-pasiens.index') }}>Pelayanan Pasien</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Tambah Pelayanan Pasien</a></li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {{-- Start Form --}}
                    <form action={{ route('pelayanan-pasiens.store') }} method="POST">
                        @csrf
                        {{-- Start Administrasi Form --}}
                        <div class="card-header">
                            <h3 class="card-title">Administrasi</h3>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                @livewire('search-pasien')
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
                                                @if ($perawat->type == 'admin')
                                                @else
                                                    @if (old('users_id') === $perawat->id)
                                                        <option value="{{ $perawat->id }}">{{ $perawat->name }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $perawat->id }}">{{ $perawat->name }}
                                                        </option>
                                                    @endif
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
                                    <label class="col-sm-3 col-form-label">RPS</label>
                                    <div class="col-sm-5">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="rps"
                                                value="{{ old('rps') }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">RPO</label>
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
                                    <label class="col-sm-3 col-form-label">Tanda Vital</label>
                                    <div class="col-sm-5">
                                        <div class="input-group mb-3">
                                            <textarea class="form-control" name="tanda_vital">{{ old('tanda_vital') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Diagnosa</label>
                                    <div class="col-sm-5">
                                        <div class="input-group mb-3">
                                            <textarea class="form-control" name="diagnosa">{{ old('diagnosa') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Penatalaksanaan</label>
                                    <div class="col-sm-5">
                                        <div class="input-group mb-3">
                                            <textarea class="form-control" name="penatalaksanaan">{{ old('penatalaksanaan') }}</textarea>
                                        </div>
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
