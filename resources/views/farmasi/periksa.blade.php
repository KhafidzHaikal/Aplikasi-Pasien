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
                <li class="breadcrumb-item"><a href={{ route('farmasi.index') }}>Pelayanan Pasien</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Periksa Pasien</a></li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {{-- Start Form --}}
                    <form action={{ route('farmasi.store', $pelayanan_pasien->id) }} method="POST">
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
                                    <label class="col-sm-3 col-form-label">Nama Petugas</label>
                                    <div class="col-sm-5">
                                        <select class="form-control" name="users_id" id="noPerawatSelect">
                                            <option selected> --- Pilih Nama Petugas --- </option>
                                            @foreach ($perawats as $perawat)
                                                @if ($perawat->type == 'farmasi')
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
                        <div class="card-body" id="obat">
                            <div class="basic-form">
                                <h3 class="card-title">Obat 1</h3>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Obat</label>
                                    <div class="col-sm-5">
                                        <select class="form-control" name="obats_no_obat" id="icd">
                                            <option value=""> --- Pilih Obat --- </option>
                                            @foreach ($obats as $obat)
                                                @if (old('obats_no_obat') == $obat->no_obat)
                                                    <option value="{{ $obat->no_obat }}" selected>{{ $obat->name }}
                                                    </option>
                                                @else
                                                    <option value="{{ $obat->no_obat }}">{{ $obat->name }}
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
                                    <label class="col-sm-3 col-form-label">Jumlah Obat</label>
                                    <div class="col-sm-5">
                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control" name="stok"
                                                value="{{ old('stok') }}" required>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            </div>
                            <div class="basic-form">
                                <h3 class="card-title">Obat 2</h3>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Obat</label>
                                    <div class="col-sm-5">
                                        <select class="form-control" name="obatssatu_no_obat" id="obatsatu">
                                            <option value=""> --- Pilih Obat --- </option>
                                            @foreach ($obats as $obat)
                                                @if (old('obatssatu_no_obat') == $obat->no_obat)
                                                    <option value="{{ $obat->no_obat }}" selected>{{ $obat->name }}
                                                    </option>
                                                @else
                                                    <option value="{{ $obat->no_obat }}">{{ $obat->name }}
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
                                            <input type="text" class="form-control" name="dosissatu"
                                                value="{{ old('dosissatu') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Jumlah Obat</label>
                                    <div class="col-sm-5">
                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control" name="stoksatu"
                                                value="{{ old('stoksatu') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="basic-form">
                                <h3 class="card-title">Obat 3</h3>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Obat</label>
                                    <div class="col-sm-5">
                                        <select class="form-control" name="obatsdua_no_obat" id="obatdua">
                                            <option value=""> --- Pilih Obat --- </option>
                                            @foreach ($obats as $obat)
                                                @if (old('obatsdua_no_obat') == $obat->no_obat)
                                                    <option value="{{ $obat->no_obat }}" selected>{{ $obat->name }}
                                                    </option>
                                                @else
                                                    <option value="{{ $obat->no_obat }}">{{ $obat->name }}
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
                                            <input type="text" class="form-control" name="dosisdua"
                                                value="{{ old('dosisdua') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Jumlah Obat</label>
                                    <div class="col-sm-5">
                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control" name="stokdua"
                                                value="{{ old('stokdua') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="basic-form">
                                <h3 class="card-title">Obat 4</h3>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Obat</label>
                                    <div class="col-sm-5">
                                        <select class="form-control" name="obatstiga_no_obat" id="obattiga">
                                            <option value=""> --- Pilih Obat --- </option>
                                            @foreach ($obats as $obat)
                                                @if (old('obatstiga_no_obat') == $obat->no_obat)
                                                    <option value="{{ $obat->no_obat }}" selected>{{ $obat->name }}
                                                    </option>
                                                @else
                                                    <option value="{{ $obat->no_obat }}">{{ $obat->name }}
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
                                            <input type="text" class="form-control" name="dosistiga"
                                                value="{{ old('dosistiga') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Jumlah Obat</label>
                                    <div class="col-sm-5">
                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control" name="stoktiga"
                                                value="{{ old('stoktiga') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="basic-form">
                                <h3 class="card-title">Obat 5</h3>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Obat</label>
                                    <div class="col-sm-5">
                                        <select class="form-control" name="obatsempat_no_obat" id="obatempat">
                                            <option value=""> --- Pilih Obat --- </option>
                                            @foreach ($obats as $obat)
                                                @if (old('obatsempat_no_obat') == $obat->no_obat)
                                                    <option value="{{ $obat->no_obat }}" selected>{{ $obat->name }}
                                                    </option>
                                                @else
                                                    <option value="{{ $obat->no_obat }}">{{ $obat->name }}
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
                                            <input type="text" class="form-control" name="dosisempat"
                                                value="{{ old('dosisempat') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Jumlah Obat</label>
                                    <div class="col-sm-5">
                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control" name="stokempat"
                                                value="{{ old('stokempat') }}">
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
