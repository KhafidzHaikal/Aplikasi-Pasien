@extends('components.index')

@section('body')
    <link rel="stylesheet" href="/css/myCss.css">
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
                    <form action={{ route('kajian-pasiens.store') }} method="POST">
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
                                                @if (old('pasiens_no_rm') === $pasien->no_rm)
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
                                            value="{{ old('tanggal_pemeriksaan') }}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nama Petugas</label>
                                    <div class="col-sm-5">
                                        <select class="form-control" name="users_id" id="noPerawatSelect">
                                            <option selected> --- Pilih No.Register Perawat ---- </option>
                                            @foreach ($perawats as $user)
                                                @if (old('users_id') === $user->id)
                                                    <option value="{{ $user->id }}">{{ $user->name }}
                                                    </option>
                                                @else
                                                    <option value="{{ $user->id }}">{{ $user->name }}
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
                            <div class="basic-form hasil-pemeriksaan-pasien">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Tensi</label>
                                    <div class="col-sm-8">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="tensi"
                                                value="{{ old('tensi') }}" required maxlength="7">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">mm/Hg</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nadi</label>
                                    <div class="col-sm-8">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="nadi"
                                                value="{{ old('nadi') }}" required maxlength="7">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">x/menit</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Resp</label>
                                    <div class="col-sm-8">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="resp"
                                                value="{{ old('resp') }}" required maxlength="7">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">x/menit</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Suhu</label>
                                    <div class="col-sm-8">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="suhu"
                                                value="{{ old('suhu') }}" required maxlength="7">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><sup>o</sup>C</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Berat Badan</label>
                                    <div class="col-sm-8">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="bb"
                                                value="{{ old('bb') }}" required maxlength="7">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Kg</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Tinggi Badan</label>
                                    <div class="col-sm-8">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="tb"
                                                value="{{ old('tb') }}" required maxlength="7">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">cm</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Indeks Massa Tubuh (IMT)</label>
                                    <div class="col-sm-8">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="imt"
                                                value="{{ old('imt') }}" required maxlength="7">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Kg/M<sup>2</sup></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- End Identitas Pasien Form --}}
                        {{-- ------------- Start Data Penunjang --------------- --}}
                        <hr>
                        <div class="card-header">
                            <h3 class="card-title">Data Pengkajian Pasien</h3>
                        </div>
                        <div class="grid-data-penunjang">
                            {{-- ------------- Start Sirkulasi Cairan --------------- --}}
                            <div class="card-body">
                                <h3 class="col-sm-12 col-form-label">Sirkulasi / Cairan</h3>
                                <div class="basic-form">
                                    <div class="form-group">
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="sirkulasi_cairan[]"
                                                id="sirkulasiTidakAda" value="Tidak Ada Kelainan"
                                                @if (is_array(old('sirkulasi_cairan')) && in_array('Tidak Ada Kelainan', old('sirkulasi_cairan'))) checked @endif>
                                            <label class="form-check-label" for="sirkulasiTidakAda"><strong><strong>Tidak Ada
                                                Kelainan</strong></strong></label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" id="sirkulasiAsites"
                                                name="sirkulasi_cairan[]" value="Asites"
                                                @if (is_array(old('sirkulasi_cairan')) && in_array('Asites', old('sirkulasi_cairan'))) checked @endif>
                                            <label class="form-check-label" for="sirkulasiAsites">Asites</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" id="sirkulasiAkralDingan"
                                                name="sirkulasi_cairan[]" value="Akral Dingan"
                                                @if (is_array(old('sirkulasi_cairan')) && in_array('Akral Dingan', old('sirkulasi_cairan'))) checked @endif>
                                            <label class="form-check-label" for="sirkulasiAkralDingan">Akral
                                                Dingan</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" id="sirkulasiBunyiJantung"
                                                name="sirkulasi_cairan[]" value="Bunyi Jantung"
                                                @if (is_array(old('sirkulasi_cairan')) && in_array('Bunyi Jantung', old('sirkulasi_cairan'))) checked @endif>
                                            <label class="form-check-label" for="sirkulasiBunyiJantung">Bunyi
                                                Jantung</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" id="sirkulasiAnemia"
                                                name="sirkulasi_cairan[]" value="Anemia"
                                                @if (is_array(old('sirkulasi_cairan')) && in_array('Anemia', old('sirkulasi_cairan'))) checked @endif>
                                            <label class="form-check-label" for="sirkulasiAnemia">Anemia</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" id="sirkulasiPerdarahan"
                                                name="sirkulasi_cairan[]" value="Perdarahan"
                                                @if (is_array(old('sirkulasi_cairan')) && in_array('Perdarahan', old('sirkulasi_cairan'))) checked @endif>
                                            <label class="form-check-label" for="sirkulasiPerdarahan">Perdarahan</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" id="sirkulasiDehidrasi"
                                                name="sirkulasi_cairan[]" value="Dehidrasi"
                                                @if (is_array(old('sirkulasi_cairan')) && in_array('Dehidrasi', old('sirkulasi_cairan'))) checked @endif>
                                            <label class="form-check-label" for="sirkulasiDehidrasi">Dehidrasi</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" id="sirkulasiPusing"
                                                name="sirkulasi_cairan[]" value="Pusing"
                                                @if (is_array(old('sirkulasi_cairan')) && in_array('Pusing', old('sirkulasi_cairan'))) checked @endif>
                                            <label class="form-check-label" for="sirkulasiPusing">Pusing</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" id="sirkulasiKesemutan"
                                                name="sirkulasi_cairan[]" value="Kesemutan"
                                                @if (is_array(old('sirkulasi_cairan')) && in_array('Kesemutan', old('sirkulasi_cairan'))) checked @endif>
                                            <label class="form-check-label" for="sirkulasiKesemutan">Kesemutan</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" id="sirkulasiBerkeringat"
                                                name="sirkulasi_cairan[]" value="Berkeringat"
                                                @if (is_array(old('sirkulasi_cairan')) && in_array('Berkeringat', old('sirkulasi_cairan'))) checked @endif>
                                            <label class="form-check-label" for="sirkulasiBerkeringat">Berkeringat</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" id="sirkulasiRasaHaus"
                                                name="sirkulasi_cairan[]" value="Rasa Haus"
                                                @if (is_array(old('sirkulasi_cairan')) && in_array('Rasa Haus', old('sirkulasi_cairan'))) checked @endif>
                                            <label class="form-check-label" for="sirkulasiRasaHaus">Rasa Haus</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" id="sirkulasiPengisian"
                                                name="sirkulasi_cairan[]" value="Pengisian Kapiler > 3" @if (is_array(old('sirkulasi_cairan')) && in_array('Pengisian Kapiler > 3', old('sirkulasi_cairan')))
                                            checked
                                            @endif>
                                            <label class="form-check-label" for="sirkulasiPengisian">Pengisian Kapiler >
                                                3</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- ------------- End Sirkulasi Cairan --------------- --}}
                            {{-- ------------- Start Perkemihan --------------- --}}
                            <div class="card-body">
                                <h3 class="col-sm-12 col-form-label">Perkemihan</h3>
                                <div class="basic-form">
                                    <div class="form-group">
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="perkemihan[]"
                                                id="perkemihanTidakAda" value="Tidak Ada Kelainan"
                                                @if (is_array(old('perkemihan')) && in_array('Tidak Ada Kelainan', old('perkemihan'))) checked @endif>
                                            <label class="form-check-label" for="perkemihanTidakAda"><strong>Tidak Ada
                                                Kelainan</strong></label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="perkemihan[]"
                                                id="perkemihanPolaBak" value="Pola Bak"
                                                @if (is_array(old('perkemihan')) && in_array('Pola Bak', old('perkemihan'))) checked @endif>
                                            <label class="form-check-label" for="perkemihanPolaBak">Pola Bak</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="perkemihan[]"
                                                id="perkemihanHemaruri" value="Hemaruri"
                                                @if (is_array(old('perkemihan')) && in_array('Hemaruri', old('perkemihan'))) checked @endif>
                                            <label class="form-check-label" for="perkemihanHemaruri">Hemaruri</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="perkemihan[]"
                                                id="perkemihanOliguria" value="Oliguria"
                                                @if (is_array(old('perkemihan')) && in_array('Oliguria', old('perkemihan'))) checked @endif>
                                            <label class="form-check-label" for="perkemihanOliguria">Oliguria</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="perkemihan[]"
                                                id="perkemihanDisuria" value="Disuria"
                                                @if (is_array(old('perkemihan')) && in_array('Disuria', old('perkemihan'))) checked @endif>
                                            <label class="form-check-label" for="perkemihanDisuria">Disuria</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="perkemihan[]"
                                                id="perkemihanInkontinensia" value="Inkontinensia"
                                                @if (is_array(old('perkemihan')) && in_array('Inkontinensia', old('perkemihan'))) checked @endif>
                                            <label class="form-check-label"
                                                for="perkemihanInkontinensia">Inkontinensia</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="perkemihan[]"
                                                id="perkemihanRetensi" value="Retensi"
                                                @if (is_array(old('perkemihan')) && in_array('Retensi', old('perkemihan'))) checked @endif>
                                            <label class="form-check-label" for="perkemihanRetensi">Retensi</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="perkemihan[]"
                                                id="perkemihanNyeriSaatBAK" value="Nyeri Saat BAK"
                                                @if (is_array(old('perkemihan')) && in_array('Nyeri Saat BAK', old('perkemihan'))) checked @endif>
                                            <label class="form-check-label" for="perkemihanNyeriSaatBAK">Nyeri Saat
                                                BAK</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="perkemihan[]"
                                                id="perkemihanAlatBantuBAK" value="Alat Bantu BAK"
                                                @if (is_array(old('perkemihan')) && in_array('Alat Bantu BAK', old('perkemihan'))) checked @endif>
                                            <label class="form-check-label" for="perkemihanAlatBantuBAK">Alat Bantu
                                                BAK</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="perkemihan[]"
                                                id="perkemihanKemampuanBAB" value="Kemampuan BAB"
                                                @if (is_array(old('perkemihan')) && in_array('Kemampuan BAB', old('perkemihan'))) checked @endif>
                                            <label class="form-check-label" for="perkemihanKemampuanBAB">Kemampuan
                                                BAB</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="perkemihan[]"
                                                id="perkemihanAlatBantuBAB" value="Alat Bantu BAB"
                                                @if (is_array(old('perkemihan')) && in_array('Alat Bantu BAB', old('perkemihan'))) checked @endif>
                                            <label class="form-check-label" for="perkemihanAlatBantuBAB">Alat Bantu
                                                BAB</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- ------------- End Perkemihan --------------- --}}
                            {{-- ------------- Start Pernapasan --------------- --}}
                            <div class="card-body">
                                <h3 class="col-sm-12 col-form-label">Pernapasan</h3>
                                <div class="basic-form">
                                    <div class="form-group">
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="pernapasan[]"
                                                id="pernapasanTidakAda" value="Tidak Ada Kelainan"
                                                @if (is_array(old('pernapasan')) && in_array('Tidak Ada Kelainan', old('pernapasan'))) checked @endif>
                                            <label class="form-check-label" for="pernapasanTidakAda"><strong>Tidak Ada
                                                Kelainan</strong></label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="pernapasan[]"
                                                id="pernapasanSekretSlym" value="Sekret/Slym"
                                                @if (is_array(old('pernapasan')) && in_array('Sekret/Slym', old('pernapasan'))) checked @endif>
                                            <label class="form-check-label" for="pernapasanSekretSlym">Sekret/Slym</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="pernapasan[]"
                                                id="pernapasanIramaIregular" value="Irama Iregular"
                                                @if (is_array(old('pernapasan')) && in_array('Irama Iregular', old('pernapasan'))) checked @endif>
                                            <label class="form-check-label" for="pernapasanIramaIregular">Irama
                                                Iregular</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="pernapasan[]"
                                                id="pernapasanWheezing" value="Wheezing"
                                                @if (is_array(old('pernapasan')) && in_array('Wheezing', old('pernapasan'))) checked @endif>
                                            <label class="form-check-label" for="pernapasanWheezing">Wheezing</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="pernapasan[]"
                                                id="pernapasanRonkhi" value="Ronkhi"
                                                @if (is_array(old('pernapasan')) && in_array('Ronkhi', old('pernapasan'))) checked @endif>
                                            <label class="form-check-label" for="pernapasanRonkhi">Ronkhi</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="pernapasan[]"
                                                id="pernapasanOtotBantuNapas" value="Otot Bantu Napas"
                                                @if (is_array(old('pernapasan')) && in_array('Otot Bantu Napas', old('pernapasan'))) checked @endif>
                                            <label class="form-check-label" for="pernapasanOtotBantuNapas">Otot Bantu
                                                Napas</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="pernapasan[]"
                                                id="pernapasanAlatBantuNapas" value="Alat Bantu Napas"
                                                @if (is_array(old('pernapasan')) && in_array('Alat Bantu Napas', old('pernapasan'))) checked @endif>
                                            <label class="form-check-label" for="pernapasanAlatBantuNapas">Alat Bantu
                                                Napas</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="pernapasan[]"
                                                id="pernapasanDispnea" value="Dispnea"
                                                @if (is_array(old('pernapasan')) && in_array('Dispnea', old('pernapasan'))) checked @endif>
                                            <label class="form-check-label" for="pernapasanDispnea">Dispnea</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="pernapasan[]"
                                                id="pernapasanSesak" value="Sesak"
                                                @if (is_array(old('pernapasan')) && in_array('Sesak', old('pernapasan'))) checked @endif>
                                            <label class="form-check-label" for="pernapasanSesak">Sesak</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="pernapasan[]"
                                                id="pernapasanStridor" value="Stridor"
                                                @if (is_array(old('pernapasan')) && in_array('Stridor', old('pernapasan'))) checked @endif>
                                            <label class="form-check-label" for="pernapasanStridor">Stridor</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="pernapasan[]"
                                                id="pernapasanKrepirasi" value="Krepirasi"
                                                @if (is_array(old('pernapasan')) && in_array('Krepirasi', old('pernapasan'))) checked @endif>
                                            <label class="form-check-label" for="pernapasanKrepirasi">Krepirasi</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- ------------- End Pernapasan --------------- --}}
                            {{-- ------------- Start Pencernaan --------------- --}}
                            <div class="card-body">
                                <h3 class="col-sm-12 col-form-label">Pencernaan</h3>
                                <div class="basic-form">
                                    <div class="form-group">
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="pencernaan[]"
                                                id="pencernaanTidakAda" value="Tidak Ada Kelainan"
                                                @if (is_array(old('pencernaan')) && in_array('Tidak Ada Kelainan', old('pencernaan'))) checked @endif>
                                            <label class="form-check-label" for="pencernaanTidakAda"><strong>Tidak Ada
                                                Kelainan</strong></label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="pencernaan[]"
                                                id="pencernaanMual" value="Mual"
                                                @if (is_array(old('pencernaan')) && in_array('Mual', old('pencernaan'))) checked @endif>
                                            <label class="form-check-label" for="pencernaanMual">Mual</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="pencernaan[]"
                                                id="pencernaanMuntah" value="Muntah"
                                                @if (is_array(old('pencernaan')) && in_array('Muntah', old('pencernaan'))) checked @endif>
                                            <label class="form-check-label" for="pencernaanMuntah">Muntah</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="pencernaan[]"
                                                id="pencernaanKembung" value="Kembung"
                                                @if (is_array(old('pencernaan')) && in_array('Kembung', old('pencernaan'))) checked @endif>
                                            <label class="form-check-label" for="pencernaanKembung">Kembung</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="pencernaan[]"
                                                id="pencernaanNafsuMakan" value="Nafsu Makan"
                                                @if (is_array(old('pencernaan')) && in_array('Nafsu Makan', old('pencernaan'))) checked @endif>
                                            <label class="form-check-label" for="pencernaanNafsuMakan">Nafsu Makan</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="pencernaan[]"
                                                id="pencernaanSulitMenelan" value="Sulit Menelan"
                                                @if (is_array(old('pencernaan')) && in_array('Sulit Menelan', old('pencernaan'))) checked @endif>
                                            <label class="form-check-label" for="pencernaanSulitMenelan">Sulit
                                                Menelan</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="pencernaan[]"
                                                id="pencernaanBauNapas" value="Bau Napas"
                                                @if (is_array(old('pencernaan')) && in_array('Bau Napas', old('pencernaan'))) checked @endif>
                                            <label class="form-check-label" for="pencernaanBauNapas">Bau Napas</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="pencernaan[]"
                                                id="pencernaanDisphagia" value="Disphagia"
                                                @if (is_array(old('pencernaan')) && in_array('Disphagia', old('pencernaan'))) checked @endif>
                                            <label class="form-check-label" for="pencernaanDisphagia">Disphagia</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="pencernaan[]"
                                                id="pencernaanDistensiAbdomen" value="Distensi Abdomen"
                                                @if (is_array(old('pencernaan')) && in_array('Distensi Abdomen', old('pencernaan'))) checked @endif>
                                            <label class="form-check-label" for="pencernaanDistensiAbdomen">Distensi
                                                Abdomen</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="pencernaan[]"
                                                id="pencernaanBisingUsus" value="Bising Usus"
                                                @if (is_array(old('pencernaan')) && in_array('Bising Usus', old('pencernaan'))) checked @endif>
                                            <label class="form-check-label" for="pencernaanBisingUsus">Bising Usus</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="pencernaan[]"
                                                id="pencernaanKonstipasi" value="Konstipasi"
                                                @if (is_array(old('pencernaan')) && in_array('Konstipasi', old('pencernaan'))) checked @endif>
                                            <label class="form-check-label" for="pencernaanKonstipasi">Konstipasi</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="pencernaan[]"
                                                id="pencernaanDiare" value="Diare"
                                                @if (is_array(old('pencernaan')) && in_array('Diare', old('pencernaan'))) checked @endif>
                                            <label class="form-check-label" for="pencernaanDiare">Diare</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="pencernaan[]"
                                                id="pencernaanHemoroid" value="Hemoroid"
                                                @if (is_array(old('pencernaan')) && in_array('Hemoroid', old('pencernaan'))) checked @endif>
                                            <label class="form-check-label" for="pencernaanHemoroid">Hemoroid</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="pencernaan[]"
                                                id="pencernaanTerabaMasaAbdomen" value="Teraba Masa Abdomen"
                                                @if (is_array(old('pencernaan')) && in_array('Teraba Masa Abdomen', old('pencernaan'))) checked @endif>
                                            <label class="form-check-label" for="pencernaanTerabaMasaAbdomen">Teraba Masa
                                                Abdomen</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="pencernaan[]"
                                                id="pencernaanStomatitisWarna" value="Stomatitis Warna"
                                                @if (is_array(old('pencernaan')) && in_array('Stomatitis Warna', old('pencernaan'))) checked @endif>
                                            <label class="form-check-label" for="pencernaanStomatitisWarna">Stomatitis
                                                Warna</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="pencernaan[]"
                                                id="pencernaanMaag" value="Maag"
                                                @if (is_array(old('pencernaan')) && in_array('Maag', old('pencernaan'))) checked @endif>
                                            <label class="form-check-label" for="pencernaanMaag">Maag</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="pencernaan[]"
                                                id="pencernaanKonsistensiKhusus" value="Konsistensi Dien Khusus"
                                                @if (is_array(old('pencernaan')) && in_array('Konsistensi Dien Khusus', old('pencernaan'))) checked @endif>
                                            <label class="form-check-label" for="pencernaanKonsistensiKhusus">Konsistensi
                                                Dien Khusus</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="pencernaan[]"
                                                id="pencernaanKebiasaanMinum" value="Kebiasaan Makan-Minum"
                                                @if (is_array(old('pencernaan')) && in_array('Kebiasaan Makan-Minum', old('pencernaan'))) checked @endif>
                                            <label class="form-check-label" for="pencernaanKebiasaanMinum">Kebiasaan
                                                Makan-Minum</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="pencernaan[]"
                                                id="pencernaanAlergiMinuman" value="Alergi Makanan/Minuman"
                                                @if (is_array(old('pencernaan')) && in_array('Alergi Makanan/Minuman', old('pencernaan'))) checked @endif>
                                            <label class="form-check-label" for="pencernaanAlergiMinuman">Alergi
                                                Makanan/Minuman</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="pencernaan[]"
                                                id="pencernaanAlatBantu" value="Alat Bantu"
                                                @if (is_array(old('pencernaan')) && in_array('Alat Bantu', old('pencernaan'))) checked @endif>
                                            <label class="form-check-label" for="pencernaanAlatBantu">Alat Bantu</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- ------------- Start Muskuloskeletal --------------- --}}
                            <div class="card-body">
                                <h3 class="col-sm-12 col-form-label">Muskuloskeletal</h3>
                                <div class="basic-form">
                                    <div class="form-group">
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="muskuloskeletal[]"
                                                id="muskuloskeletalTidakAda" value="Tidak Ada Kelainan"
                                                @if (is_array(old('muskuloskeletal')) && in_array('Tidak Ada Kelainan', old('muskuloskeletal'))) checked @endif>
                                            <label class="form-check-label" for="muskuloskeletalTidakAda"><strong>Tidak Ada
                                                Kelainan</strong></label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="muskuloskeletal[]"
                                                id="muskuloskeletalTonusOtot" value="Tonus Otot"
                                                @if (is_array(old('muskuloskeletal')) && in_array('Tonus Otot', old('muskuloskeletal'))) checked @endif>
                                            <label class="form-check-label" for="muskuloskeletalTonusOtot">Tonus
                                                Otot</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="muskuloskeletal[]"
                                                id="muskuloskeletalKontraktur" value="Kontraktur"
                                                @if (is_array(old('muskuloskeletal')) && in_array('Kontraktur', old('muskuloskeletal'))) checked @endif>
                                            <label class="form-check-label"
                                                for="muskuloskeletalKontraktur">Kontraktur</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="muskuloskeletal[]"
                                                id="muskuloskeletalFraktur" value="Fraktur"
                                                @if (is_array(old('muskuloskeletal')) && in_array('Fraktur', old('muskuloskeletal'))) checked @endif>
                                            <label class="form-check-label" for="muskuloskeletalFraktur">Fraktur</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="muskuloskeletal[]"
                                                id="muskuloskeletalNyeriTulang" value="Nyeri Otot Tulang"
                                                @if (is_array(old('muskuloskeletal')) && in_array('Nyeri Otot Tulang', old('muskuloskeletal'))) checked @endif>
                                            <label class="form-check-label" for="muskuloskeletalNyeriTulang">Nyeri Otot
                                                Tulang</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="muskuloskeletal[]"
                                                id="muskuloskeletalDropFootLokasi" value="Drop Foot Lokasi"
                                                @if (is_array(old('muskuloskeletal')) && in_array('Drop Foot Lokasi', old('muskuloskeletal'))) checked @endif>
                                            <label class="form-check-label" for="muskuloskeletalDropFootLokasi">Drop Foot
                                                Lokasi</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="muskuloskeletal[]"
                                                id="muskuloskeletalTremor" value="Tremor"
                                                @if (is_array(old('muskuloskeletal')) && in_array('Tremor', old('muskuloskeletal'))) checked @endif>
                                            <label class="form-check-label" for="muskuloskeletalTremor">Tremor</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="muskuloskeletal[]"
                                                id="muskuloskeletalMalaseFatique" value="Malase/Fatique"
                                                @if (is_array(old('muskuloskeletal')) && in_array('Malase/Fatique', old('muskuloskeletal'))) checked @endif>
                                            <label class="form-check-label"
                                                for="muskuloskeletalMalaseFatique">Malase/Fatique</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="muskuloskeletal[]"
                                                id="muskuloskeletalAtropi" value="Atropi"
                                                @if (is_array(old('muskuloskeletal')) && in_array('Atropi', old('muskuloskeletal'))) checked @endif>
                                            <label class="form-check-label" for="muskuloskeletalAtropi">Atropi</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="muskuloskeletal[]"
                                                id="muskuloskeletalKekuatanOtot" value="Kekuatan Otot"
                                                @if (is_array(old('muskuloskeletal')) && in_array('Kekuatan Otot', old('muskuloskeletal'))) checked @endif>
                                            <label class="form-check-label" for="muskuloskeletalKekuatanOtot">Kekuatan
                                                Otot</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="muskuloskeletal[]"
                                                id="muskuloskeletalPosturTidakNormal" value="Postur Tidak Normal"
                                                @if (is_array(old('muskuloskeletal')) && in_array('Postur Tidak Normal', old('muskuloskeletal'))) checked @endif>
                                            <label class="form-check-label" for="muskuloskeletalPosturTidakNormal">Postur
                                                Tidak Normal</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="muskuloskeletal[]"
                                                id="muskuloskeletalRPSAtas" value="RPS Atas"
                                                @if (is_array(old('muskuloskeletal')) && in_array('RPS Atas', old('muskuloskeletal'))) checked @endif>
                                            <label class="form-check-label" for="muskuloskeletalRPSAtas">RPS Atas</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="muskuloskeletal[]"
                                                id="muskuloskeletalRPSBawah" value="RPS Bawah"
                                                @if (is_array(old('muskuloskeletal')) && in_array('RPS Bawah', old('muskuloskeletal'))) checked @endif>
                                            <label class="form-check-label" for="muskuloskeletalRPSBawah">RPS
                                                Bawah</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="muskuloskeletal[]"
                                                id="muskuloskeletalBerdiri" value="Berdiri"
                                                @if (is_array(old('muskuloskeletal')) && in_array('Berdiri', old('muskuloskeletal'))) checked @endif>
                                            <label class="form-check-label" for="muskuloskeletalBerdiri">Berdiri</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="muskuloskeletal[]"
                                                id="muskuloskeletalBerjalan" value="Berjalan"
                                                @if (is_array(old('muskuloskeletal')) && in_array('Berjalan', old('muskuloskeletal'))) checked @endif>
                                            <label class="form-check-label" for="muskuloskeletalBerjalan">Berjalan</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="muskuloskeletal[]"
                                                id="muskuloskeletalAlatBantu" value="Alat Bantu"
                                                @if (is_array(old('muskuloskeletal')) && in_array('Alat Bantu', old('muskuloskeletal'))) checked @endif>
                                            <label class="form-check-label" for="muskuloskeletalAlatBantu">Alat
                                                Bantu</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="muskuloskeletal[]"
                                                id="muskuloskeletalNyeri" value="Nyeri"
                                                @if (is_array(old('muskuloskeletal')) && in_array('Nyeri', old('muskuloskeletal'))) checked @endif>
                                            <label class="form-check-label" for="muskuloskeletalNyeri">Nyeri</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- ------------- End Muskuloskeletal --------------- --}}
                            {{-- ------------- Start Neurosensori --------------- --}}
                            <div class="card-body">
                                <h3 class="col-sm-12 col-form-label">Neurosensori</h3>
                                <div class="basic-form">
                                    <div class="form-group">
                                        <strong>Fungsi Penglihatan</strong>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="fungsi_penglihatan[]"
                                                id="penglihatanTidakAda" value="Tidak Ada Kelainan"
                                                @if (is_array(old('fungsi_penglihatan')) && in_array('Tidak Ada Kelainan', old('fungsi_penglihatan'))) checked @endif>
                                            <label class="form-check-label" for="penglihatanTidakAda"><strong>Tidak Ada
                                                Kelainan</strong></label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="fungsi_penglihatan[]"
                                                id="penglihatanBuram" value="Buram"
                                                @if (is_array(old('fungsi_penglihatan')) && in_array('Buram', old('fungsi_penglihatan'))) checked @endif>
                                            <label class="form-check-label" for="penglihatanBuram">Buram</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="fungsi_penglihatan[]"
                                                id="penglihatanTidakBisaMelihat" value="Tidak Bisa Melihat"
                                                @if (is_array(old('fungsi_penglihatan')) && in_array('Tidak Bisa Melihat', old('fungsi_penglihatan'))) checked @endif>
                                            <label class="form-check-label" for="penglihatanTidakBisaMelihat">Tidak Bisa
                                                Melihat</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="fungsi_penglihatan[]"
                                                id="penglihatanAlatBantu" value="Alat Bantu"
                                                @if (is_array(old('fungsi_penglihatan')) && in_array('Alat Bantu', old('fungsi_penglihatan'))) checked @endif>
                                            <label class="form-check-label" for="penglihatanAlatBantu">Alat Bantu</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <strong>Fungsi Penglihatan</strong>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="fungsi_pendengaran[]"
                                                id="fungsi_pendengaranTidakAda" value="Tidak Ada Kelainan"
                                                @if (is_array(old('fungsi_pendengaran')) && in_array('Tidak Ada Kelainan', old('fungsi_pendengaran'))) checked @endif>
                                            <label class="form-check-label" for="fungsi_pendengaranTidakAda"><strong>Tidak Ada
                                                Kelainan</strong></label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="fungsi_pendengaran[]"
                                                id="fungsi_pendengaranKurangJelas" value="Kurang Jelas"
                                                @if (is_array(old('fungsi_pendengaran')) && in_array('Kurang Jelas', old('fungsi_pendengaran'))) checked @endif>
                                            <label class="form-check-label" for="fungsi_pendengaranKurangJelas">Kurang
                                                Jelas</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="fungsi_pendengaran[]"
                                                id="fungsi_pendengaranTuli" value="Tuli"
                                                @if (is_array(old('fungsi_pendengaran')) && in_array('Tuli', old('fungsi_pendengaran'))) checked @endif>
                                            <label class="form-check-label" for="fungsi_pendengaranTuli">Tuli</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="fungsi_pendengaran[]"
                                                id="fungsi_pendengaranTinnitus" value="Tinnitus"
                                                @if (is_array(old('fungsi_pendengaran')) && in_array('Tinnitus', old('fungsi_pendengaran'))) checked @endif>
                                            <label class="form-check-label"
                                                for="fungsi_pendengaranTinnitus">Tinnitus</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="fungsi_pendengaran[]"
                                                id="fungsi_pendengaranAlatBantu" value="Alat Bantu"
                                                @if (is_array(old('fungsi_pendengaran')) && in_array('Alat Bantu', old('fungsi_pendengaran'))) checked @endif>
                                            <label class="form-check-label" for="fungsi_pendengaranAlatBantu">Alat
                                                Bantu</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <strong>Fungsi Perasa</strong>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="fungsi_perasa[]"
                                                id="fungsi_perasaTidakAda" value="Tidak Ada Kelainan"
                                                @if (is_array(old('fungsi_perasa')) && in_array('Tidak Ada Kelainan', old('fungsi_perasa'))) checked @endif>
                                            <label class="form-check-label" for="fungsi_perasaTidakAda"><strong>Tidak Ada
                                                Kelainan</strong></label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="fungsi_perasa[]"
                                                id="fungsi_perasaMampu" value="Mampu"
                                                @if (is_array(old('fungsi_perasa')) && in_array('Mampu', old('fungsi_perasa'))) checked @endif>
                                            <label class="form-check-label" for="fungsi_perasaMampu">Mampu</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="fungsi_perasa[]"
                                                id="fungsi_perasaTerganggu" value="Terganggu"
                                                @if (is_array(old('fungsi_perasa')) && in_array('Terganggu', old('fungsi_perasa'))) checked @endif>
                                            <label class="form-check-label" for="fungsi_perasaTerganggu">Terganggu</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <strong>Fungsi Perabaan</strong>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="fungsi_perabaan[]"
                                                id="fungsi_perabaanTidakAda" value="Tidak Ada Kelainan"
                                                @if (is_array(old('fungsi_perabaan')) && in_array('Tidak Ada Kelainan', old('fungsi_perabaan'))) checked @endif>
                                            <label class="form-check-label" for="fungsi_perabaanTidakAda"><strong>Tidak Ada
                                                Kelainan</strong></label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="fungsi_perabaan[]"
                                                id="fungsi_perabaanKesemutan" value="Kesemutan"
                                                @if (is_array(old('fungsi_perabaan')) && in_array('Kesemutan', old('fungsi_perabaan'))) checked @endif>
                                            <label class="form-check-label"
                                                for="fungsi_perabaanKesemutan">Kesemutan</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="fungsi_perabaan[]"
                                                id="fungsi_perabaanKebas" value="Kebas"
                                                @if (is_array(old('fungsi_perabaan')) && in_array('Kebas', old('fungsi_perabaan'))) checked @endif>
                                            <label class="form-check-label" for="fungsi_perabaanKebas">Kebas</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="fungsi_perabaan[]"
                                                id="fungsi_perabaanDisorientasi" value="Disorientasi"
                                                @if (is_array(old('fungsi_perabaan')) && in_array('Disorientasi', old('fungsi_perabaan'))) checked @endif>
                                            <label class="form-check-label"
                                                for="fungsi_perabaanDisorientasi">Disorientasi</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="fungsi_perabaan[]"
                                                id="fungsi_perabaanHalusinasi" value="Halusinasi"
                                                @if (is_array(old('fungsi_perabaan')) && in_array('Halusinasi', old('fungsi_perabaan'))) checked @endif>
                                            <label class="form-check-label"
                                                for="fungsi_perabaanHalusinasi">Halusinasi</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="fungsi_perabaan[]"
                                                id="fungsi_perabaanAmnesia" value="Amnesia"
                                                @if (is_array(old('fungsi_perabaan')) && in_array('Amnesia', old('fungsi_perabaan'))) checked @endif>
                                            <label class="form-check-label" for="fungsi_perabaanAmnesia">Amnesia</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="fungsi_perabaan[]"
                                                id="fungsi_perabaanParese" value="Parese"
                                                @if (is_array(old('fungsi_perabaan')) && in_array('Parese', old('fungsi_perabaan'))) checked @endif>
                                            <label class="form-check-label" for="fungsi_perabaanParese">Parese</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="fungsi_perabaan[]"
                                                id="fungsi_perabaanDisartria" value="Disartria"
                                                @if (is_array(old('fungsi_perabaan')) && in_array('Disartria', old('fungsi_perabaan'))) checked @endif>
                                            <label class="form-check-label"
                                                for="fungsi_perabaanDisartria">Disartria</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="fungsi_perabaan[]"
                                                id="fungsi_perabaanParalisis" value="Paralisis"
                                                @if (is_array(old('fungsi_perabaan')) && in_array('Paralisis', old('fungsi_perabaan'))) checked @endif>
                                            <label class="form-check-label"
                                                for="fungsi_perabaanParalisis">Paralisis</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="fungsi_perabaan[]"
                                                id="fungsi_perabaanRefleksPatologis" value="Refleks Patologis"
                                                @if (is_array(old('fungsi_perabaan')) && in_array('Refleks Patologis', old('fungsi_perabaan'))) checked @endif>
                                            <label class="form-check-label" for="fungsi_perabaanRefleksPatologis">Refleks
                                                Patologis</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="fungsi_perabaan[]"
                                                id="fungsi_perabaanKejang" value="Kejang"
                                                @if (is_array(old('fungsi_perabaan')) && in_array('Kejang', old('fungsi_perabaan'))) checked @endif>
                                            <label class="form-check-label" for="fungsi_perabaanKejang">Kejang</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <strong>Fungsi Penciuman</strong>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="fungsi_penciuman[]"
                                                id="fungsi_penciumanTidakAda" value="Tidak Ada Kelainan"
                                                @if (is_array(old('fungsi_penciuman')) && in_array('Tidak Ada Kelainan', old('fungsi_penciuman'))) checked @endif>
                                            <label class="form-check-label" for="fungsi_penciumanTidakAda"><strong>Tidak Ada
                                                Kelainan</strong></label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="fungsi_penciuman[]"
                                                id="fungsi_penciumanMampu" value="Mampu"
                                                @if (is_array(old('fungsi_penciuman')) && in_array('Mampu', old('fungsi_penciuman'))) checked @endif>
                                            <label class="form-check-label" for="fungsi_penciumanMampu">Mampu</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="fungsi_penciuman[]"
                                                id="fungsi_penciumanTerganggu" value="Terganggu"
                                                @if (is_array(old('fungsi_penciuman')) && in_array('Terganggu', old('fungsi_penciuman'))) checked @endif>
                                            <label class="form-check-label"
                                                for="fungsi_penciumanTerganggu">Terganggu</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- ------------- End Neurosensori --------------- --}}
                            {{-- ------------- Start Kulit --------------- --}}
                            <div class="card-body">
                                <h3 class="col-sm-12 col-form-label">Kulit</h3>
                                <div class="basic-form">
                                    <div class="form-group">
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="kulit[]"
                                                id="kulitTidakAda" value="Tidak Ada Kelainan"
                                                @if (is_array(old('kulit')) && in_array('Tidak Ada Kelainan', old('kulit'))) checked @endif>
                                            <label class="form-check-label" for="kulitTidakAda"><strong>Tidak Ada Kelainan</strong></label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="kulit[]"
                                                id="kulitJaringanParut" value="Jaringan Parut"
                                                @if (is_array(old('kulit')) && in_array('Jaringan Parut', old('kulit'))) checked @endif>
                                            <label class="form-check-label" for="kulitJaringanParut">Jaringan
                                                Parut</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="kulit[]"
                                                id="kulitBulae/Lepuh" value="Bulae/Lepuh"
                                                @if (is_array(old('kulit')) && in_array('Bulae/Lepuh', old('kulit'))) checked @endif>
                                            <label class="form-check-label" for="kulitBulae/Lepuh">Bulae/Lepuh</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="kulit[]"
                                                id="kulitMemar" value="Memar"
                                                @if (is_array(old('kulit')) && in_array('Memar', old('kulit'))) checked @endif>
                                            <label class="form-check-label" for="kulitMemar">Memar</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="kulit[]"
                                                id="kulitLaserasi" value="Laserasi"
                                                @if (is_array(old('kulit')) && in_array('Laserasi', old('kulit'))) checked @endif>
                                            <label class="form-check-label" for="kulitLaserasi">Laserasi</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="kulit[]"
                                                id="kulitUlserasi" value="Ulserasi"
                                                @if (is_array(old('kulit')) && in_array('Ulserasi', old('kulit'))) checked @endif>
                                            <label class="form-check-label" for="kulitUlserasi">Ulserasi</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="kulit[]"
                                                id="kulitPus" value="Pus"
                                                @if (is_array(old('kulit')) && in_array('Pus', old('kulit'))) checked @endif>
                                            <label class="form-check-label" for="kulitPus">Pus</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="kulit[]"
                                                id="kulitPendarahanBawah" value="Pendarahan Bawah"
                                                @if (is_array(old('kulit')) && in_array('Pendarahan Bawah', old('kulit'))) checked @endif>
                                            <label class="form-check-label" for="kulitPendarahanBawah">Pendarahan
                                                Bawah</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="kulit[]"
                                                id="kulitKrustae" value="Krustae"
                                                @if (is_array(old('kulit')) && in_array('Krustae', old('kulit'))) checked @endif>
                                            <label class="form-check-label" for="kulitKrustae">Krustae</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="kulit[]"
                                                id="kulitLukaBakarKulit" value="Luka Bakar Kulit"
                                                @if (is_array(old('kulit')) && in_array('Luka Bakar Kulit', old('kulit'))) checked @endif>
                                            <label class="form-check-label" for="kulitLukaBakarKulit">Luka Bakar
                                                Kulit</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="kulit[]"
                                                id="kulitPerubahanWarna" value="Perubahan Warna"
                                                @if (is_array(old('kulit')) && in_array('Perubahan Warna', old('kulit'))) checked @endif>
                                            <label class="form-check-label" for="kulitPerubahanWarna">Perubahan
                                                Warna</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="kulit[]"
                                                id="kulitDecubitus" value="Decubitus"
                                                @if (is_array(old('kulit')) && in_array('Decubitus', old('kulit'))) checked @endif>
                                            <label class="form-check-label" for="kulitDecubitus">Decubitus</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- ------------- End Kulit --------------- --}}
                            {{-- ------------- Start Mental --------------- --}}
                            <div class="card-body">
                                <h3 class="col-sm-12 col-form-label">Mental</h3>
                                <div class="basic-form">
                                    <div class="form-group">
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="mental[]"
                                                id="mentalTidakAda" value="Tidak Ada Kelainan"
                                                @if (is_array(old('mental')) && in_array('Tidak Ada Kelainan', old('mental'))) checked @endif>
                                            <label class="form-check-label" for="mentalTidakAda"><strong>Tidak Ada
                                                Kelainan</strong></label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="mental[]"
                                                id="mentalCemas" value="Cemas"
                                                @if (is_array(old('mental')) && in_array('Cemas', old('mental'))) checked @endif>
                                            <label class="form-check-label" for="mentalCemas">Cemas</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="mental[]"
                                                id="mentalDeniel" value="Deniel"
                                                @if (is_array(old('mental')) && in_array('Deniel', old('mental'))) checked @endif>
                                            <label class="form-check-label" for="mentalDeniel">Deniel</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="mental[]"
                                                id="mentalMarah" value="Marah"
                                                @if (is_array(old('mental')) && in_array('Marah', old('mental'))) checked @endif>
                                            <label class="form-check-label" for="mentalMarah">Marah</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="mental[]"
                                                id="mentalTakut" value="Takut"
                                                @if (is_array(old('mental')) && in_array('Takut', old('mental'))) checked @endif>
                                            <label class="form-check-label" for="mentalTakut">Takut</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="mental[]"
                                                id="mentalPutusAsa" value="Putus Asa"
                                                @if (is_array(old('mental')) && in_array('Putus Asa', old('mental'))) checked @endif>
                                            <label class="form-check-label" for="mentalPutusAsa">Putus Asa</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="mental[]"
                                                id="mentalDepresi" value="Depresi"
                                                @if (is_array(old('mental')) && in_array('Depresi', old('mental'))) checked @endif>
                                            <label class="form-check-label" for="mentalDepresi">Depresi</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="mental[]"
                                                id="mentalRendahDiri" value="Rendah Diri"
                                                @if (is_array(old('mental')) && in_array('Rendah Diri', old('mental'))) checked @endif>
                                            <label class="form-check-label" for="mentalRendahDiri">Rendah Diri</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="mental[]"
                                                id="mentalMenarikDiri<" value="Menarik Diri<"
                                                @if (is_array(old('mental')) && in_array('Menarik Diri<', old('mental'))) checked @endif>
                                            <label class="form-check-label" for="mentalMenarikDiri<">Menarik Diri</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="mental[]"
                                                id="mentalAgresif" value="Agresif"
                                                @if (is_array(old('mental')) && in_array('Agresif', old('mental'))) checked @endif>
                                            <label class="form-check-label" for="mentalAgresif">Agresif</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="mental[]"
                                                id="mentalPerilakuKekerasan" value="Perilaku Kekerasan"
                                                @if (is_array(old('mental')) && in_array('Perilaku Kekerasan', old('mental'))) checked @endif>
                                            <label class="form-check-label" for="mentalPerilakuKekerasan">Perilaku
                                                Kekerasan</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="mental[]"
                                                id="mentalResponPascaTrauma" value="Respon Pasca Trauma"
                                                @if (is_array(old('mental')) && in_array('Respon Pasca Trauma', old('mental'))) checked @endif>
                                            <label class="form-check-label" for="mentalResponPascaTrauma">Respon Pasca
                                                Trauma</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="mental[]"
                                                id="mentalTidakMauRusak" value="Tidak Mau Lihat Bagian Tubuh Yang Rusak"
                                                @if (is_array(old('mental')) && in_array('Tidak Mau Lihat Bagian Tubuh Yang Rusak', old('mental'))) checked @endif>
                                            <label class="form-check-label" for="mentalTidakMauRusak">Tidak Mau Lihat
                                                Bagian Tubuh Yang Rusak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- ------------- End Mental --------------- --}}
                            {{-- ------------- Start Kebersihan Diri --------------- --}}
                            <div class="card-body">
                                <h3 class="col-sm-12 col-form-label">Kebersihan Diri</h3>
                                <div class="basic-form">
                                    <div class="form-group">
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="kebersihan_diri[]"
                                                id="kebersihan_diriTidakAda" value="Tidak Ada Kelainan"
                                                @if (is_array(old('kebersihan_diri')) && in_array('Tidak Ada Kelainan', old('kebersihan_diri'))) checked @endif>
                                            <label class="form-check-label" for="kebersihan_diriTidakAda"><strong>Tidak Ada
                                                Kelainan</strong></label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="kebersihan_diri[]"
                                                id="kebersihan_diriGigiMulutKotor" value="Gigi Mulut Kotor"
                                                @if (is_array(old('kebersihan_diri')) && in_array('Gigi Mulut Kotor', old('kebersihan_diri'))) checked @endif>
                                            <label class="form-check-label" for="kebersihan_diriGigiMulutKotor">Gigi
                                                Mulut Kotor</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="kebersihan_diri[]"
                                                id="kebersihan_diriMataKotor" value="Mata Kotor"
                                                @if (is_array(old('kebersihan_diri')) && in_array('Mata Kotor', old('kebersihan_diri'))) checked @endif>
                                            <label class="form-check-label" for="kebersihan_diriMataKotor">Mata
                                                Kotor</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="kebersihan_diri[]"
                                                id="kebersihan_diriKulitKotor" value="Kulit Kotor"
                                                @if (is_array(old('kebersihan_diri')) && in_array('Kulit Kotor', old('kebersihan_diri'))) checked @endif>
                                            <label class="form-check-label" for="kebersihan_diriKulitKotor">Kulit
                                                Kotor</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="kebersihan_diri[]"
                                                id="kebersihan_diriPerinealGenitalKotor" value="Perineal/Genital Kotor"
                                                @if (is_array(old('kebersihan_diri')) && in_array('Perineal/Genital Kotor', old('kebersihan_diri'))) checked @endif>
                                            <label class="form-check-label"
                                                for="kebersihan_diriPerinealGenitalKotor">Perineal/Genital Kotor</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="kebersihan_diri[]"
                                                id="kebersihan_diriHidungKotor" value="Hidung Kotor"
                                                @if (is_array(old('kebersihan_diri')) && in_array('Hidung Kotor', old('kebersihan_diri'))) checked @endif>
                                            <label class="form-check-label" for="kebersihan_diriHidungKotor">Hidung
                                                Kotor</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="kebersihan_diri[]"
                                                id="kebersihan_diriKukuKotor" value="Kuku Kotor"
                                                @if (is_array(old('kebersihan_diri')) && in_array('Kuku Kotor', old('kebersihan_diri'))) checked @endif>
                                            <label class="form-check-label" for="kebersihan_diriKukuKotor">Kuku
                                                Kotor</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="kebersihan_diri[]"
                                                id="kebersihan_diriTelingaKotor" value="Telinga Kotor"
                                                @if (is_array(old('kebersihan_diri')) && in_array('Telinga Kotor', old('kebersihan_diri'))) checked @endif>
                                            <label class="form-check-label" for="kebersihan_diriTelingaKotor">Telinga
                                                Kotor</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="kebersihan_diri[]"
                                                id="kebersihan_diriRambutKepalaKotor" value="Rambut Kepala Kotor"
                                                @if (is_array(old('kebersihan_diri')) && in_array('Rambut Kepala Kotor', old('kebersihan_diri'))) checked @endif>
                                            <label class="form-check-label"
                                                for="kebersihan_diriRambutKepalaKotor">Rambut Kepala Kotor</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- ------------- End Kebersihan Diri --------------- --}}
                            {{-- ------------- Start Tidur dan Istirahat --------------- --}}
                            <div class="card-body">
                                <h3 class="col-sm-12 col-form-label">Tidur dan Istirahat</h3>
                                <div class="basic-form">
                                    <div class="form-group">
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="tidur_istirahat[]"
                                                id="tidur_istirahatTidakAda" value="Tidak Ada Kelainan"
                                                @if (is_array(old('tidur_istirahat')) && in_array('Tidak Ada Kelainan', old('tidur_istirahat'))) checked @endif>
                                            <label class="form-check-label" for="tidur_istirahatTidakAda"><strong>Tidak Ada
                                                Kelainan</strong></label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="tidur_istirahat[]"
                                                id="tidur_istirahatSusahTidur" value="Susah Tidur"
                                                @if (is_array(old('tidur_istirahat')) && in_array('Susah Tidur', old('tidur_istirahat'))) checked @endif>
                                            <label class="form-check-label" for="tidur_istirahatSusahTidur">Susah
                                                Tidur</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="tidur_istirahat[]"
                                                id="tidur_istirahatWaktuTidur" value="Waktu Tidur"
                                                @if (is_array(old('tidur_istirahat')) && in_array('Waktu Tidur', old('tidur_istirahat'))) checked @endif>
                                            <label class="form-check-label" for="tidur_istirahatWaktuTidur">Waktu
                                                Tidur</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="tidur_istirahat[]"
                                                id="tidur_istirahatBantuanObat" value="Bantuan Obat"
                                                @if (is_array(old('tidur_istirahat')) && in_array('Bantuan Obat', old('tidur_istirahat'))) checked @endif>
                                            <label class="form-check-label" for="tidur_istirahatBantuanObat">Bantuan
                                                Obat</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- ------------- End Tidur dan Istirahat --------------- --}}
                            {{-- ------------- Start Komunikasi dan Budaya --------------- --}}
                            <div class="card-body">
                                <h3 class="col-sm-12 col-form-label">Komunikasi dan Budaya</h3>
                                <div class="basic-form">
                                    <div class="form-group">
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="komunikasi[]"
                                                id="komunikasiTidakAda" value="Tidak Ada Kelainan"
                                                @if (is_array(old('komunikasi')) && in_array('Tidak Ada Kelainan', old('komunikasi'))) checked @endif>
                                            <label class="form-check-label" for="komunikasiTidakAda"><strong>Tidak Ada
                                                Kelainan</strong></label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="komunikasi[]"
                                                id="komunikasiInteraksiKeluarga" value="Interaksi dengan Keluarga"
                                                @if (is_array(old('komunikasi')) && in_array('Interaksi dengan Keluarga', old('komunikasi'))) checked @endif>
                                            <label class="form-check-label" for="komunikasiInteraksiKeluarga">Interaksi
                                                dengan Keluarga</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="komunikasi[]"
                                                id="komunikasiBerkomunikasi" value="Berkomunikasi"
                                                @if (is_array(old('komunikasi')) && in_array('Berkomunikasi', old('komunikasi'))) checked @endif>
                                            <label class="form-check-label"
                                                for="komunikasiBerkomunikasi">Berkomunikasi</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="komunikasi[]"
                                                id="komunikasiKegiatanSehari" value="Kegiatan Sehari"
                                                @if (is_array(old('komunikasi')) && in_array('Kegiatan Sehari', old('komunikasi'))) checked @endif>
                                            <label class="form-check-label" for="komunikasiKegiatanSehari">Kegiatan
                                                Sehari</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- ------------- End Komunikasi dan Budaya --------------- --}}
                            {{-- ------------- Start Perawatan Diri Sehari-hari --------------- --}}
                            <div class="card-body">
                                <h3 class="col-sm-12 col-form-label">Perawatan Diri Sehari-hari</h3>
                                <div class="basic-form">
                                    <div class="form-group">
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="perawatan_diri[]"
                                                id="perawatan_diriTidakAda" value="Tidak Ada Kelainan"
                                                @if (is_array(old('perawatan_diri')) && in_array('Tidak Ada Kelainan', old('perawatan_diri'))) checked @endif>
                                            <label class="form-check-label" for="perawatan_diriTidakAda"><strong>Tidak Ada
                                                Kelainan</strong></label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="perawatan_diri[]"
                                                id="perawatan_diriMandi" value="Mandi"
                                                @if (is_array(old('perawatan_diri')) && in_array('Mandi', old('perawatan_diri'))) checked @endif>
                                            <label class="form-check-label" for="perawatan_diriMandi">Mandi</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="perawatan_diri[]"
                                                id="perawatan_diriBerpakaian" value="Berpakaian"
                                                @if (is_array(old('perawatan_diri')) && in_array('Berpakaian', old('perawatan_diri'))) checked @endif>
                                            <label class="form-check-label"
                                                for="perawatan_diriBerpakaian">Berpakaian</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" name="perawatan_diri[]"
                                                id="perawatan_diriMenyisirRambut" value="Menyisir Rambut"
                                                @if (is_array(old('perawatan_diri')) && in_array('Menyisir Rambut', old('perawatan_diri'))) checked @endif>
                                            <label class="form-check-label" for="perawatan_diriMenyisirRambut">Menyisir
                                                Rambut</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- ------------- End Perawatan Diri Sehari-hari --------------- --}}
                        </div>
                        {{-- ------------- End Data Penunjang --------------- --}}
                        {{-- -------- Start Data Penunjang Medis ----------- --}}
                        <hr>
                        <div class="card-header">
                            <h3 class="card-title">Data Penunjang Medis Pasien</h3>
                        </div>
                        <div class="card-body">
                            <div class="basic-form data-pengkajian-pasien">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Laboratorium</label>
                                    <div class="col-sm-9">
                                        <div class="input-group mb-3">
                                            <textarea class="ckeditor form-control" name="labolatorium">{{ old('labolatorium') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Radiologi</label>
                                    <div class="col-sm-9">
                                        <div class="input-group mb-3">
                                            <textarea class="ckeditor form-control" name="radiologi">{{ old('radiologi') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">EKG</label>
                                    <div class="col-sm-9">
                                        <div class="input-group mb-3">
                                            <textarea class="ckeditor form-control" name="ekg">{{ old('ekg') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">USG</label>
                                    <div class="col-sm-9">
                                        <div class="input-group mb-3">
                                            <textarea class="ckeditor form-control" name="usg">{{ old('usg') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- -------- End Data Penunjang Medis ----------- --}}
                        {{-- -------- Start ----------- --}}
                        <div class="card-body">
                            <div class="basic-form">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Pilih Poli</label>
                                    <div class="col-sm-5">
                                        <select class="form-control" name="unit_pelayanans_id" id="noPerawatSelect">
                                            <option selected> --- Pilih Poli ---- </option>
                                            @foreach ($unit_pelayanans as $unit_pelayanan)
                                                @if (old('unit_pelayanans_id') === $unit_pelayanan->id)
                                                    <option value="{{ $unit_pelayanan->id }}">{{ $unit_pelayanan->name }}
                                                    </option>
                                                @else
                                                    <option value="{{ $unit_pelayanan->id }}">{{ $unit_pelayanan->name }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- --------- End ----------- --}}
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
