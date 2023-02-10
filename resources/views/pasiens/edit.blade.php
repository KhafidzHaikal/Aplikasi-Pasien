@extends('components.index')

@section('body')
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Edit Pasien</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href={{ route('pasiens.index') }}>Pasien</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Pasien</a></li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {{-- Start Form --}}
                    <form action={{ route('pasiens.update', $pasien->no_rm) }} method="POST">
                        @method('put')
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
                                            value="{{ old('no_rm', $pasien->no_rm) }}" required maxlength="8">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Tanggal Kunjungan</label>
                                    <div class="col-sm-5">
                                        <input type="date" class="form-control" name="tanggal_kunjungan"
                                            value="{{ old('tanggal_kunjungan', $pasien->tanggal_kunjungan->toDateString()) }}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nama Petugas</label>
                                    <div class="col-sm-5">
                                        <select class="form-control" name="users_id" id="noPerawatSelect">
                                            <option selected> --- Pilih Nama Petugas ---- </option>
                                            @foreach ($petugas as $user)
                                                @if ($user->type == 'nurse')
                                                    @if (old('users_id', $pasien->users->id) === $user->id)
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
                                            value="{{ old('name', $pasien->name) }}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                    <div class="col-sm-5">
                                        <input type="date" class="form-control" name="tanggal_lahir"
                                            value="{{ old('tanggal_lahir', $pasien->tanggal_lahir->toDateString()) }}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                    <div class="col-sm-5">
                                        <select class="form-control" name="jenis_kelamin">
                                            <option value="Laki-laki" {{ $pasien->jenis_kelamin === 'Laki-laki' ? 'Selected' : ''}}>Laki-laki</option>
                                            <option value="Perempuan" {{ $pasien->jenis_kelamin === 'Perempuan' ? 'Selected' : ''}}>Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nomor Induk Keluarga</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="nik"
                                            value="{{ old('nik', $pasien->nik) }}" required maxlength="16">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nama Kepala Keluarga</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="nama_kk"
                                            value="{{ old('nama_kk', $pasien->nama_kk) }}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Alamat</label>
                                    <div class="col-sm-5">
                                        <textarea class="form-control" name="alamat">{{ old('alamat', $pasien->alamat) }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Pekerjaan</label>
                                    <div class="col-sm-5">
                                        <select class="form-control" name="pekerjaan">
                                            <option value="Belum Bekerja" {{ $pasien->pekerjaan === 'Belum Bekerja' ? 'Selected' : ''}}>Belum Bekerja</option>
                                            <option value="Tidak Kerja" {{ $pasien->pekerjaan === 'Tidak Kerja' ? 'Selected' : ''}}>Tidak Kerja</option>
                                            <option value="Buruh Tani" {{ $pasien->pekerjaan === 'Buruh Tani' ? 'Selected' : ''}}>Buruh Tani</option>
                                            <option value="Berdagang" {{ $pasien->pekerjaan === 'Berdagang' ? 'Selected' : ''}}>Berdagang</option>
                                            <option value="Wiraswasta" {{ $pasien->pekerjaan === 'Wiraswasta' ? 'Selected' : ''}}>Wiraswasta</option>
                                            <option value="TNI/POLRI" {{ $pasien->pekerjaan === 'TNI/POLRI' ? 'Selected' : ''}}>TNI/POLRI</option>
                                            <option value="ASN" {{ $pasien->pekerjaan === 'ASN' ? 'Selected' : ''}}>ASN</option>
                                            <option value="Pensiunan" {{ $pasien->pekerjaan === 'Pensiunan' ? 'Selected' : ''}}>Pensiunan</option>
                                            <option value="Dan Lain-lain" {{ $pasien->pekerjaan === 'Dan Lain-lain' ? 'Selected' : ''}}>Dan Lain-lain</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Pendidikan</label>
                                    <div class="col-sm-5">
                                        <select class="form-control" name="pendidikan">
                                            <option value="Tidak Sekolah" {{ $pasien->pendidikan === 'Tidak Sekolah' ? 'Selected' : ''}}>Tidak Sekolah</option>
                                            <option value="Tidak Tamat SD" {{ $pasien->pendidikan === 'Tidak Tamat SD' ? 'Selected' : ''}}>Tidak Tamat SD</option>
                                            <option value="Sekolah Dasar" {{ $pasien->pendidikan === 'Sekolah Dasar' ? 'Selected' : ''}}>Sekolah Dasar</option>
                                            <option value="SLTP/Sederajat" {{ $pasien->pendidikan === 'SLTP/Sederajat' ? 'Selected' : ''}}>SLTP/Sederajat</option>
                                            <option value="SLTA/Sederajat" {{ $pasien->pendidikan === 'SLTA/Sederajat' ? 'Selected' : ''}}>SLTA/Sederajat</option>
                                            <option value="S1" {{ $pasien->pendidikan === 'S1' ? 'Selected' : ''}}>S1</option>
                                            <option value="S2" {{ $pasien->pendidikan === 'S2' ? 'Selected' : ''}}>S2</option>
                                            <option value="Dan Lain-lain" {{ $pasien->pendidikan === 'Dan Lain-lain' ? 'Selected' : ''}}>Dan Lain-lain</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Agama</label>
                                    <div class="col-sm-5">
                                        <select class="form-control" name="agama">
                                            <option value="Islam" {{ $pasien->agama === 'Islam' ? 'Selected' : ''}}>Islam</option>
                                            <option value="Kristen" {{ $pasien->agama === 'Kristen' ? 'Selected' : ''}}>Kristen</option>
                                            <option value="Protestan" {{ $pasien->agama === 'Protestan' ? 'Selected' : ''}}>Protestan</option>
                                            <option value="Hindu" {{ $pasien->agama === 'Hindu' ? 'Selected' : ''}}>Hindu</option>
                                            <option value="Budha" {{ $pasien->agama === 'Budha' ? 'Selected' : ''}}>Budha</option>
                                            <option value="Kepercayaan" {{ $pasien->agama === 'Kepercayaan' ? 'Selected' : ''}}>Kepercayaan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Status Perkawinan</label>
                                    <div class="col-sm-5">
                                        <select class="form-control" name="status_perkawinan">
                                            <option value="Belum Kawin" {{ $pasien->status_perkawinan === 'Belum Kawin' ? 'Selected' : ''}}>Belum Kawin</option>
                                            <option value="Kawin" {{ $pasien->status_perkawinan === 'Kawin' ? 'Selected' : ''}}>Kawin</option>
                                            <option value="Janda" {{ $pasien->status_perkawinan === 'Janda' ? 'Selected' : ''}}>Janda</option>
                                            <option value="Duda" {{ $pasien->status_perkawinan === 'Duda' ? 'Selected' : ''}}>Duda</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Pembiayaan</label>
                                    <div class="col-sm-5">
                                        <select class="form-control" name="pembiayaan">
                                            <option value="Umum" {{ $pasien->pembiayaan === 'Umum' ? 'Selected' : ''}}>Umum</option>
                                            <option value="BPJS PBI" {{ $pasien->pembiayaan === 'BPJS PBI' ? 'Selected' : ''}}>BPJS PBI</option>
                                            <option value="BPJS NON PBI" {{ $pasien->pembiayaan === 'BPJS NON PBI' ? 'Selected' : ''}}>BPJS NON PBI</option>
                                            <option value="Asuransi Lainnya" {{ $pasien->pembiayaan === 'Asuransi Lainnya' ? 'Selected' : ''}}>Asuransi Lainnya</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Status Kunjungan</label>
                                    <div class="col-sm-5">
                                        <select class="form-control" name="status_kunjungan">
                                            <option value="Lama" {{ $pasien->status_kunjungan === 'Lama' ? 'Selected' : ''}}>Lama</option>
                                            <option value="Baru" {{ $pasien->status_kunjungan === 'Baru' ? 'Selected' : ''}}>Baru</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Alergi Obat</label>
                                    <div class="col-sm-5">
                                        <select name="alergi_obat" id="keluhan" class="form-control">
                                            <option value="ya" {{ $pasien->alergi_obat === 'ya' ? 'Selected' : ''}}>Ya</option>
                                            <option value="Tidak" {{ $pasien->alergi_obat === 'Tidak' ? 'Selected' : ''}}>Tidak</option>
                                        </select>
                                        <input style="display: none" id="amount_keluhan" class="form-control"
                                            disabled="disabled" name="alergi_obat" value="{{ old('alergi_obat', $pasien->alergi_obat) }}">
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
