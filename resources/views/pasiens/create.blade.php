@extends('components.index')

@section('body')
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Tambah Pasien</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href={{ route('pasiens.index') }}>Pasien</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Tambah Pasien</a></li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {{-- Start Form --}}
                    <form action={{ route('pasiens.store') }} method="POST">
                        @csrf
                        {{-- Start Administrasi Form --}}
                        <div class="card-header">
                            <h3 class="card-title">Administrasi</h3>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">No Registrasi</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="no_rm"
                                            @error('no_rm') is-invalid @enderror value="{{ old('no_rm') }}" required
                                            maxlength="8">
                                        @error('no_rm')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Tanggal Kunjungan</label>
                                    <div class="col-sm-5">
                                        <input type="date" class="form-control" name="tanggal_kunjungan"
                                            value="{{ old('tanggal_kunjungan') }}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nama Petugas</label>
                                    <div class="col-sm-5">
                                        <select class="form-control" name="users_id" id="noPerawatSelect">
                                            <option selected> --- Pilih Nama Petugas ---- </option>
                                            @foreach ($petugas as $user)
                                                @if ($user->type == 'nurse')
                                                    @if (old('users_id') === $user->id)
                                                        <option value="{{ $user->id }}">{{ $user->name }}
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
                            <h3 class="card-title">Identitas Pasien</h3>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nama Pasien</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="name"
                                            value="{{ old('name') }}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                    <div class="col-sm-5">
                                        <input type="date" class="form-control" name="tanggal_lahir"
                                            value="{{ old('tanggal_lahir') }}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                    <div class="col-sm-5">
                                        <select class="form-control" name="jenis_kelamin" required>
                                            <option> --- Pilih Jenis Kelamin ---- </option>
                                            <option value="Laki-laki" @if (old('jenis_kelamin') === 'Laki-laki') 'Selected' @endif>
                                                Laki-laki</option>
                                            <option value="Perempuan" @if (old('jenis_kelamin') === 'Perempuan') 'Selected' @endif>
                                                Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nomor Induk Keluarga</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="nik"
                                            @error('nik') is-invalid @enderror value="{{ old('nik') }}" required
                                            maxlength="16">
                                        @error('nik')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nama Kepala Keluarga</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="nama_kk"
                                            value="{{ old('nama_kk') }}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Alamat</label>
                                    <div class="col-sm-5">
                                        <textarea class="form-control" name="alamat">{{ old('alamat') }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Pekerjaan</label>
                                    <div class="col-sm-5">
                                        <select class="form-control" name="pekerjaan">
                                            <option> --- Pilih Pekerjaan ---- </option>
                                            <option value="Belum Bekerja">Belum Bekerja</option>
                                            <option value="Tidak Kerja">Tidak Kerja</option>
                                            <option value="Buruh Tani">Buruh Tani</option>
                                            <option value="Berdagang">Berdagang</option>
                                            <option value="Wiraswasta">Wiraswasta</option>
                                            <option value="TNI/POLRI">TNI/POLRI</option>
                                            <option value="ASN">ASN</option>
                                            <option value="Pensiunan">Pensiunan</option>
                                            <option value="Dan Lain-lain">Dan Lain-lain</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Pendidikan</label>
                                    <div class="col-sm-5">
                                        <select class="form-control" name="pendidikan">
                                            <option> --- Pilih Pendidikan ---- </option>
                                            <option value="Tidak Sekolah">Tidak Sekolah</option>
                                            <option value="Tidak Tamat SD">Tidak Tamat SD</option>
                                            <option value="Sekolah Dasar">Sekolah Dasar</option>
                                            <option value="SLTP/Sederajat">SLTP/Sederajat</option>
                                            <option value="SLTA/Sederajat">SLTA/Sederajat</option>
                                            <option value="S1">S1</option>
                                            <option value="S2">S2</option>
                                            <option value="Dan Lain-lain">Dan Lain-lain</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Agama</label>
                                    <div class="col-sm-5">
                                        <select class="form-control" name="agama">
                                            <option> --- Pilih Agama ---- </option>
                                            <option value="Islam">Islam</option>
                                            <option value="Kristen">Kristen</option>
                                            <option value="Protestan">Protestan</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Budha">Budha</option>
                                            <option value="Kepercayaan">Kepercayaan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Status Perkawinan</label>
                                    <div class="col-sm-5">
                                        <select class="form-control" name="status_perkawinan">
                                            <option> --- Pilih Status Perkawinan ---- </option>
                                            <option value="Belum Kawin">Belum Kawin</option>
                                            <option value="Kawin">Kawin</option>
                                            <option value="Janda">Janda</option>
                                            <option value="Duda">Duda</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Pembiayaan</label>
                                    <div class="col-sm-5">
                                        <select class="form-control" name="pembiayaan">
                                            <option> --- Pilih Pembiayaan ---- </option>
                                            <option value="Umum">Umum</option>
                                            <option value="BPJS PBI">BPJS PBI</option>
                                            <option value="BPJS NON PBI">BPJS NON PBI</option>
                                            <option value="Asuransi Lainnya">Asuransi Lainnya</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Status Kunjungan</label>
                                    <div class="col-sm-5">
                                        <select class="form-control" name="status_kunjungan">
                                            <option> --- Pilih Status Kunjungan ---- </option>
                                            <option value="Lama">Lama</option>
                                            <option value="Baru">Baru</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Alergi Obat</label>
                                    <div class="col-sm-5">
                                        <select name="alergi_obat" id="keluhan" class="form-control">
                                            <option> ---Ada Alergi Obat---</option>
                                            <option value="ya">Ya</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>
                                        <input style="display: none" id="amount_keluhan" class="form-control"
                                            disabled="disabled" name="alergi_obat" value="{{ old('alergi_obat') }}">
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
