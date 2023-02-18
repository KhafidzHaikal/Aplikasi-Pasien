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
                <li class="breadcrumb-item"><a href={{ route('admin-farmasi.index') }}>Pelayanan Pasien</a></li>
                <li class="breadcrumb-item"><a href={{ route('admin-farmasi.create') }}>Kajian Pasien</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Periksa Pasien</a></li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {{-- Start Form --}}
                    <form action={{ route('admin-farmasi.store', $pelayanan_pasien->id) }} method="POST">
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
                                        <input type="text" class="form-control" name="pelayanan_pasiens_id"
                                            value={{ $pelayanan_pasien->id }}>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">No Registrasi Pasien</label>
                                    <div class="col-sm-5">
                                        <strong>{{ $pelayanan_pasien->kajian_pasiens->pasiens_no_rm }}</strong>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nama Pasien</label>
                                    <div class="col-sm-5">
                                        <strong>{{ $pelayanan_pasien->kajian_pasiens->pasiens->name }}</strong>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nama KK</label>
                                    <div class="col-sm-5">
                                        <strong>{{ $pelayanan_pasien->kajian_pasiens->pasiens->nama_kk }}</strong>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Resep Obat</label>
                                    <div class="col-sm-5">
                                        <strong>{{ $pelayanan_pasien->penatalaksanaan }}</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- End Administrasi Form --}}
                        <hr>
                        {{-- Start Identitas Pasien Form --}}
                        <div class="card-header">
                            <h3 class="card-title">Obat</h3>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Tanggal Pelayanan</label>
                                    <div class="col-sm-5">
                                        <input type="date" class="form-control" name="tanggal_pelayanan"
                                            value="{{ old('tanggal_pelayanan') }}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Obat</label>
                                    <div class="col-sm-5">
                                        <select class="form-control" name="obats_id" id="icd">
                                            <option selected> --- Pilih Obat --- </option>
                                            @foreach ($obats as $obat)
                                                @if (old('obats_id') == $obat->id)
                                                    <option value="{{ $obat->id }}" selected>{{ $obat->name }}
                                                    </option>
                                                @else
                                                    <option value="{{ $obat->id }}">{{ $obat->name }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Dosis</label>
                                    <div class="col-sm-5">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="dosis"
                                                value="{{ old('dosis') }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Stok</label>
                                    <div class="col-sm-5">
                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control" name="stok"
                                                value="{{ old('stok') }}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="basic-form">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Obat</label>
                                    <div class="col-sm-5">
                                        <select class="form-control" name="obats_id[]" id="icd">
                                            <option selected> --- Pilih Obat --- </option>
                                            @foreach ($obats as $obat)
                                                @if (old('obats_id') == $obat->id)
                                                    <option value="{{ $obat->name }}" selected>{{ $obat->name }}
                                                    </option>
                                                @else
                                                    <option value="{{ $obat->name }}">{{ $obat->name }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Dosis</label>
                                    <div class="col-sm-5">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="dosis[]"
                                                value="{{ old('dosis') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Stok</label>
                                    <div class="col-sm-5">
                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control" name="stok[]"
                                                value="{{ old('stok') }}">
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
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
