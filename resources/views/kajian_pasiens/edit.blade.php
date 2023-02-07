@extends('components.index')

@section('body')
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Tambah Kajian Pasien</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href={{ route('kajian-pasiens.index') }}>Kajian Pasien</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Tambah Kajian Pasien</a></li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {{-- Start Form --}}
                    <form action={{ route('kajian-pasiens.update', $kajian_pasien->id) }} method="POST">
                        @method('put')
                        @csrf
                        {{-- Start Administrasi Form --}}
                        <div class="card-header">
                            <h3 class="card-title">Administrasi</h3>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">No Registrasi Pasien</label>
                                    <div class="col-sm-5">
                                        <select class="form-control" name="pasiens_no_rm" id="noPasienSelect">
                                            <option selected> --- Pilih No.Register Pasien ---- </option>
                                            @foreach ($pasiens as $pasien)
                                                @if (old('pasiens_no_rm', $kajian_pasien->pasiens->no_rm) === $pasien->no_rm)
                                                    <option value="{{ $pasien->no_rm }}" selected>{{ $pasien->no_rm }} -
                                                        {{ $pasien->name }}
                                                    </option>
                                                @else
                                                    <option value="{{ $pasien->no_rm }}">{{ $pasien->no_rm }} -
                                                        {{ $pasien->name }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Tanggal Pemeriksaan</label>
                                    <div class="col-sm-5">
                                        <input type="date" class="form-control" name="tanggal_pemeriksaan"
                                            value="{{ old('tanggal_pemeriksaan', $kajian_pasien->tanggal_pemeriksaan)->toDateString() }}"
                                            required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nama Petugas</label>
                                    <div class="col-sm-5">
                                        <select class="form-control" name="users_id" id="noPerawatSelect">
                                            <option selected> --- Pilih No.Register Perawat ---- </option>
                                            @foreach ($perawats as $perawat)
                                                @if (old('users_id', $kajian_pasien->users->id) === $perawat->id)
                                                    <option value="{{ $perawat->id }}" selected>{{ $perawat->username }}
                                                    </option>
                                                @else
                                                    <option value="{{ $perawat->id }}">{{ $perawat->username }}
                                                    </option>
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
                            <h3 class="card-title">Hasil Pemeriksaan Pasien</h3>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Tensi</label>
                                    <div class="col-sm-5">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="tensi"
                                                value="{{ old('tensi', $kajian_pasien->tensi) }}" required maxlength="7" maxlength="7">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">mm/Hg</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nadi</label>
                                    <div class="col-sm-5">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="nadi"
                                                value="{{ old('nadi', $kajian_pasien->nadi) }}" required maxlength="7">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">x/menit</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Resp</label>
                                    <div class="col-sm-5">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="resp"
                                                value="{{ old('resp', $kajian_pasien->resp) }}" required maxlength="7">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">x/menit</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Suhu</label>
                                    <div class="col-sm-5">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="suhu"
                                                value="{{ old('suhu', $kajian_pasien->suhu) }}" required maxlength="7">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><sup>o</sup>C</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Berat Badan</label>
                                    <div class="col-sm-5">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="bb"
                                                value="{{ old('bb', $kajian_pasien->bb) }}" required maxlength="7">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Kg</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Tinggi Badan</label>
                                    <div class="col-sm-5">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="tb"
                                                value="{{ old('tb', $kajian_pasien->tb) }}" required maxlength="7">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">cm</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Indeks Massa Tubuh (IMT)</label>
                                    <div class="col-sm-5">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="imt"
                                                value="{{ old('imt', $kajian_pasien->imt) }}" required maxlength="7">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Kg/M<sup>2</sup></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- End Identitas Pasien Form --}}
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
