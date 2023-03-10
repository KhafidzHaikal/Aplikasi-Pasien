@extends('components.index')

@section('body')
    <div class="row page-titles mx-0">
        <div class="col-sm-8 p-md-0">
            <div class="welcome-text">
                <h4>Detail Pasien <strong
                        style="text-decoration: underline; text-transform:uppercase">{{ $pelayanan_pasiens->kajian_pasiens->pasiens->name }}</strong>
                </h4>
            </div>
        </div>
    </div>
    <div class="row">
        {{-- ---------- Row Left ------------- --}}
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    {{-- Start Administrasi Form --}}
                    <div class="card-header">
                        <h3 class="card-title">Detail Pasien</h3>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <div class="form-group row">
                                <p class="col-sm-4 col-form-label">No Registrasi</p>
                                <div class="col-sm-8">
                                    <strong class="col-sm-8 col-form-label">:
                                        {{ $pelayanan_pasiens->kajian_pasiens->pasiens->no_rm }}</strong>
                                </div>
                            </div>
                            <div class="form-group row">
                                <p class="col-sm-4 col-form-label">Tanggal Pemeriksaan</p>
                                <div class="col-sm-8">
                                    <strong class="col-sm-8 col-form-label">:
                                        {{ $pelayanan_pasiens->tanggal_pemeriksaan->format('d-m-Y') }}</strong>
                                </div>
                            </div>
                            <div class="form-group row">
                                <p class="col-sm-4 col-form-label">Nama Dokter</p>
                                <div class="col-sm-8">
                                    <strong class="col-sm-8 col-form-label">:
                                        {{ $pelayanan_pasiens->users->name }}</strong>
                                </div>
                            </div>
                            <div class="form-group row">
                                <p class="col-sm-4 col-form-label">Poli</p>
                                <div class="col-sm-8">
                                    <strong class="col-sm-8 col-form-label">:
                                        {{ $pelayanan_pasiens->kajian_pasiens->unit_pelayanans->name }}</strong>
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
                                <p class="col-sm-4 col-form-label">Nama Pasien</p>
                                <div class="col-sm-8">
                                    <strong class="col-sm-8 col-form-label">:
                                        {{ $pelayanan_pasiens->kajian_pasiens->pasiens->name }}</strong>
                                </div>
                            </div>
                            <div class="form-group row">
                                <p class="col-sm-4 col-form-label">Tanggal Lahir</p>
                                <div class="col-sm-8">
                                    <strong class="col-sm-8 col-form-label">:
                                        {{ $pelayanan_pasiens->kajian_pasiens->pasiens->tanggal_lahir->format('d-m-Y') }}</strong>
                                </div>
                            </div>
                            <div class="form-group row">
                                <p class="col-sm-4 col-form-label">Jenis Kelamin</p>
                                <div class="col-sm-8">
                                    <strong class="col-sm-8 col-form-label">:
                                        {{ $pelayanan_pasiens->kajian_pasiens->pasiens->jenis_kelamin }}</strong>
                                </div>
                            </div>
                            <div class="form-group row">
                                <p class="col-sm-4 col-form-label">Nomor Induk Keluarga</p>
                                <div class="col-sm-8">
                                    <strong class="col-sm-8 col-form-label">:
                                        {{ $pelayanan_pasiens->kajian_pasiens->pasiens->nik }}</strong>
                                </div>
                            </div>
                            <div class="form-group row">
                                <p class="col-sm-4 col-form-label">Nama Kepala Keluarga</p>
                                <div class="col-sm-8">
                                    <strong class="col-sm-8 col-form-label">:
                                        {{ $pelayanan_pasiens->kajian_pasiens->pasiens->nama_kk }}</strong>
                                </div>
                            </div>
                            <div class="form-group row">
                                <p class="col-sm-4 col-form-label">Alamat</p>
                                <div class="col-sm-8">
                                    <strong class="col-sm-8 col-form-label">:
                                        {{ $pelayanan_pasiens->kajian_pasiens->pasiens->alamat }}</strong>
                                </div>
                            </div>
                            <div class="form-group row">
                                <p class="col-sm-4 col-form-label">Pekerjaan</p>
                                <div class="col-sm-8">
                                    <strong class="col-sm-8 col-form-label">:
                                        {{ $pelayanan_pasiens->kajian_pasiens->pasiens->pekerjaan }}</strong>
                                </div>
                            </div>
                            <div class="form-group row">
                                <p class="col-sm-4 col-form-label">Pendidikan</p>
                                <div class="col-sm-8">
                                    <strong class="col-sm-8 col-form-label">:
                                        {{ $pelayanan_pasiens->kajian_pasiens->pasiens->pendidikan }}</strong>
                                </div>
                            </div>
                            <div class="form-group row">
                                <p class="col-sm-4 col-form-label">Agama</p>
                                <div class="col-sm-8">
                                    <strong class="col-sm-8 col-form-label">:
                                        {{ $pelayanan_pasiens->kajian_pasiens->pasiens->agama }}</strong>
                                </div>
                            </div>
                            <div class="form-group row">
                                <p class="col-sm-4 col-form-label">Status Perkawinan</p>
                                <div class="col-sm-8">
                                    <strong class="col-sm-8 col-form-label">:
                                        {{ $pelayanan_pasiens->kajian_pasiens->pasiens->status_perkawinan }}</strong>
                                </div>
                            </div>
                            <div class="form-group row">
                                <p class="col-sm-4 col-form-label">Pembiayaan</p>
                                <div class="col-sm-8">
                                    <strong class="col-sm-8 col-form-label">:
                                        {{ $pelayanan_pasiens->kajian_pasiens->pasiens->pembiayaan }}</strong>
                                </div>
                            </div>
                            <div class="form-group row">
                                <p class="col-sm-4 col-form-label">Status Kunjungan</p>
                                <div class="col-sm-8">
                                    <strong class="col-sm-8 col-form-label">:
                                        {{ $pelayanan_pasiens->kajian_pasiens->pasiens->status_kunjungan }}</strong>
                                </div>
                            </div>
                            <div class="form-group row">
                                <p class="col-sm-4 col-form-label">Alergi Obat</p>
                                <div class="col-sm-8">
                                    <strong class="col-sm-8 col-form-label">:
                                        {{ $pelayanan_pasiens->kajian_pasiens->pasiens->alergi_obat }}</strong>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        {{-- ---------- Row Left ------------- --}}
        {{-- ---------- Row Right ------------- --}}
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    {{-- Start Administrasi Form --}}
                    <div class="card-header">
                        <h3 class="card-title">Hasil Pemeriksaan Pasien</h3>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <div class="form-group row">
                                <p class="col-sm-4 col-form-label">Tensi</p>
                                <div class="col-sm-8">
                                    <strong class="col-sm-8 col-form-label">:
                                        {{ $pelayanan_pasiens->kajian_pasiens->tensi }} </strong>mm/Hg
                                </div>
                            </div>
                            <div class="form-group row">
                                <p class="col-sm-4 col-form-label">Nadi</p>
                                <div class="col-sm-8">
                                    <strong class="col-sm-8 col-form-label">:
                                        {{ $pelayanan_pasiens->kajian_pasiens->nadi }} </strong>x/menit
                                </div>
                            </div>
                            <div class="form-group row">
                                <p class="col-sm-4 col-form-label">Resp</p>
                                <div class="col-sm-8">
                                    <strong class="col-sm-8 col-form-label">:
                                        {{ $pelayanan_pasiens->kajian_pasiens->resp }} </strong>x/menit
                                </div>
                            </div>
                            <div class="form-group row">
                                <p class="col-sm-4 col-form-label">Suhu</p>
                                <div class="col-sm-8">
                                    <strong class="col-sm-8 col-form-label">:
                                        {{ $pelayanan_pasiens->kajian_pasiens->suhu }}
                                    </strong><sup>o</sup>C
                                </div>
                            </div>
                            <div class="form-group row">
                                <p class="col-sm-4 col-form-label">Berat Badan</p>
                                <div class="col-sm-8">
                                    <strong class="col-sm-8 col-form-label">: {{ $pelayanan_pasiens->kajian_pasiens->bb }}
                                    </strong>Kg
                                </div>
                            </div>
                            <div class="form-group row">
                                <p class="col-sm-4 col-form-label">Tinggu Badan</p>
                                <div class="col-sm-8">
                                    <strong class="col-sm-8 col-form-label">: {{ $pelayanan_pasiens->kajian_pasiens->tb }}
                                    </strong>cm
                                </div>
                            </div>
                            <div class="form-group row">
                                <p class="col-sm-4 col-form-label">Indeks Massa Tubuh (IMT)</p>
                                <div class="col-sm-8">
                                    <strong class="col-sm-8 col-form-label">:
                                        {{ $pelayanan_pasiens->kajian_pasiens->imt }}
                                    </strong>Kg/M<sup>2</sup>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- End Administrasi Form --}}

                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    {{-- Start Data Penunjang Form --}}
                    <div class="card-header">
                        <h3 class="card-title">Hasil Pemeriksaan Pasien</h3>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <div class="form-group row">
                                <p class="col-sm-4 col-form-label">Status Diagnosa</p>
                                <p class="col-sm-8 col-form-label">: {{ $pelayanan_pasiens->jenis_kasus }}</p>
                            </div>
                            <div class="form-group row">
                                <p class="col-sm-4 col-form-label">Keluhan Pasien</p>
                                <p class="col-sm-8 col-form-label">: {{ $pelayanan_pasiens->keluhan_utama }}</p>
                            </div>
                            <div class="form-group row">
                                <p class="col-sm-4 col-form-label">RPS</p>
                                <p class="col-sm-8 col-form-label">: {{ $pelayanan_pasiens->rps }}</p>
                            </div>
                            <div class="form-group row">
                                <p class="col-sm-4 col-form-label">RPO</p>
                                <p class="col-sm-8 col-form-label">: {{ $pelayanan_pasiens->rpo }}</p>
                            </div>
                            <div class="form-group row">
                                <p class="col-sm-4 col-form-label">ICD</p>
                                <p class="col-sm-8 col-form-label">: {{ $pelayanan_pasiens->icds->kode_icd }} -
                                    {{ $pelayanan_pasiens->icds->nama_icd }}</p>
                            </div>
                            <div class="form-group row">
                                <p class="col-sm-4 col-form-label">Terapi / Pengobatan</p>
                                <p class="col-sm-8 col-form-label">: {{ $pelayanan_pasiens->penatalaksanaan }}</p>
                            </div>
                            <div class="form-group row">
                                <p class="col-sm-4 col-form-label">Tindakan</p>
                                <p class="col-sm-8 col-form-label">: {{ $pelayanan_pasiens->tindakan }}</p>
                            </div>
                            <div class="form-group row">
                                <p class="col-sm-4 col-form-label">Edukasi</p>
                                <p class="col-sm-8 col-form-label">: {{ $pelayanan_pasiens->edukasi }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- ---------- Row Right ------------- --}}
    </div>
    <div class="card">
        <div class="card-body">
            {{-- Start Data Penunjang Form --}}
            <div class="card-header">
                <h3 class="card-title">Hasil Data Penunjang Pasien</h3>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <div class="form-group row">
                        <p class="col-sm-3 col-form-label">Sirkulasi / Cairan</p>
                        <div class="col-sm-5" style="margin-top:0.5em">
                            <strong class="col-sm-3 col-form-label">:
                                @php
                                    $sirkulasi_cairan = json_decode($pelayanan_pasiens->kajian_pasiens->sirkulasi_cairan);
                                @endphp
                                @if (is_array($sirkulasi_cairan) || is_object($sirkulasi_cairan))
                                    @foreach ($sirkulasi_cairan as $item)
                                        {{ $item }},
                                    @endforeach
                                @else
                                    {{ $pelayanan_pasiens->kajian_pasiens->sirkulasi_cairan }}
                                @endif
                            </strong>
                        </div>
                    </div>
                    <div class="form-group row">
                        <p class="col-sm-3 col-form-label">Perkemihan</p>
                        <div class="col-sm-5" style="margin-top:0.5em">
                            <strong class="col-sm-3 col-form-label">:
                                @php
                                    $perkemihan = json_decode($pelayanan_pasiens->kajian_pasiens->perkemihan);
                                @endphp
                                @if (is_array($perkemihan) || is_object($perkemihan))
                                    @foreach ($perkemihan as $item)
                                        {{ $item }},
                                    @endforeach
                                @else
                                    {{ $pelayanan_pasiens->kajian_pasiens->perkemihan }}
                                @endif

                            </strong>
                        </div>
                    </div>
                    <div class="form-group row">
                        <p class="col-sm-3 col-form-label">Pernapasan</p>
                        <div class="col-sm-5" style="margin-top:0.5em">
                            <strong class="col-sm-3 col-form-label">:
                                @php
                                    $pernapasan = json_decode($pelayanan_pasiens->kajian_pasiens->pernapasan);
                                @endphp
                                @if (is_array($pernapasan) || is_object($pernapasan))
                                    @foreach ($pernapasan as $item)
                                        {{ $item }},
                                    @endforeach
                                @else
                                    {{ $pelayanan_pasiens->kajian_pasiens->pernapasan }}
                                @endif
                            </strong>
                        </div>
                    </div>
                    <div class="form-group row">
                        <p class="col-sm-3 col-form-label">Pencernaan</p>
                        <div class="col-sm-5" style="margin-top:0.5em">
                            <strong class="col-sm-3 col-form-label">:
                                @php
                                    $pencernaan = json_decode($pelayanan_pasiens->kajian_pasiens->pencernaan);
                                @endphp
                                @if (is_array($pencernaan) || is_object($pencernaan))
                                    @foreach ($pencernaan as $item)
                                        {{ $item }},
                                    @endforeach
                                @else
                                    {{ $pelayanan_pasiens->kajian_pasiens->pencernaan }}
                                @endif
                            </strong>
                        </div>
                    </div>
                    <div class="form-group row">
                        <p class="col-sm-3 col-form-label">Muskuloskeletal</p>
                        <div class="col-sm-5" style="margin-top:0.5em">
                            <strong class="col-sm-3 col-form-label">:
                                @php
                                    $muskuloskeletal = json_decode($pelayanan_pasiens->kajian_pasiens->muskuloskeletal);
                                @endphp
                                @if (is_array($muskuloskeletal) || is_object($muskuloskeletal))
                                    @foreach ($muskuloskeletal as $item)
                                        {{ $item }},
                                    @endforeach
                                @else
                                    {{ $pelayanan_pasiens->kajian_pasiens->muskuloskeletal }}
                                @endif
                            </strong>
                        </div>
                    </div>
                    <div class="form-group row">
                        <p class="col-3 col-form-label">Neusensori</p>
                        <div class="col-7" style="margin-top:0.5em; margin-left:1em">
                            <strong>: Fungsi Penglihatan</strong> :
                            <br>
                            <p class="col-sm-12 col-form-label">
                                @php
                                    $fungsi_penglihatan = json_decode($pelayanan_pasiens->kajian_pasiens->fungsi_penglihatan);
                                @endphp
                                @if (is_array($fungsi_penglihatan) || is_object($fungsi_penglihatan))
                                    @foreach ($fungsi_penglihatan as $item)
                                        {{ $item }},
                                    @endforeach
                                @else
                                    {{ $pelayanan_pasiens->kajian_pasiens->fungsi_penglihatan }}
                                @endif
                            </p>
                            <br>
                            <strong>: Fungsi Pendengaran</strong> :
                            <br>
                            <p class="col-sm-12 col-form-label">
                                @php
                                    $fungsi_pendengaran = json_decode($pelayanan_pasiens->kajian_pasiens->fungsi_pendengaran);
                                @endphp
                                @if (is_array($fungsi_pendengaran) || is_object($fungsi_pendengaran))
                                    @foreach ($fungsi_pendengaran as $item)
                                        {{ $item }},
                                    @endforeach
                                @else
                                    {{ $pelayanan_pasiens->kajian_pasiens->fungsi_pendengaran }}
                                @endif
                            </p>
                            <br>
                            <strong>: Fungsi Perasa</strong> :
                            <br>
                            <p class="col-sm-12 col-form-label">
                                @php
                                    $fungsi_perasa = json_decode($pelayanan_pasiens->kajian_pasiens->fungsi_perasa);
                                @endphp
                                @if (is_array($fungsi_perasa) || is_object($fungsi_perasa))
                                    @foreach ($fungsi_perasa as $item)
                                        {{ $item }},
                                    @endforeach
                                @else
                                    {{ $pelayanan_pasiens->kajian_pasiens->fungsi_perasa }}
                                @endif
                            </p>
                            <br>
                            <strong>: Fungsi Perabaan</strong> :
                            <br>
                            <p class="col-sm-12 col-form-label">
                                @php
                                    $fungsi_perabaan = json_decode($pelayanan_pasiens->kajian_pasiens->fungsi_perabaan);
                                @endphp
                                @if (is_array($fungsi_perabaan) || is_object($fungsi_perabaan))
                                    @foreach ($fungsi_perabaan as $item)
                                        {{ $item }},
                                    @endforeach
                                @else
                                    {{ $pelayanan_pasiens->kajian_pasiens->fungsi_perabaan }}
                                @endif
                            </p>
                            <br>
                            <strong>: Fungsi Penciuman</strong> :
                            <br>
                            <p class="col-sm-12 col-form-label">
                                @php
                                    $fungsi_penciuman = json_decode($pelayanan_pasiens->kajian_pasiens->fungsi_penciuman);
                                @endphp
                                @if (is_array($fungsi_penciuman) || is_object($fungsi_penciuman))
                                    @foreach ($fungsi_penciuman as $item)
                                        {{ $item }},
                                    @endforeach
                                @else
                                    {{ $pelayanan_pasiens->kajian_pasiens->fungsi_penciuman }}
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <p class="col-sm-3 col-form-label">Kulit</p>
                        <div class="col-sm-5" style="margin-top:0.5em">
                            <strong class="col-sm-3 col-form-label">:
                                @php
                                    $kulit = json_decode($pelayanan_pasiens->kajian_pasiens->kulit);
                                @endphp
                                @if (is_array($kulit) || is_object($kulit))
                                    @foreach ($kulit as $item)
                                        {{ $item }},
                                    @endforeach
                                @else
                                    {{ $pelayanan_pasiens->kajian_pasiens->kulit }}
                                @endif

                            </strong>
                        </div>
                    </div>
                    <div class="form-group row">
                        <p class="col-sm-3 col-form-label">Tidur dan Istirahat</p>
                        <div class="col-sm-5" style="margin-top:0.5em">
                            <strong class="col-sm-3 col-form-label">:
                                @php
                                    $tidur_istirahat = json_decode($pelayanan_pasiens->kajian_pasiens->tidur_istirahat);
                                @endphp
                                @if (is_array($tidur_istirahat) || is_object($tidur_istirahat))
                                    @foreach ($tidur_istirahat as $item)
                                        {{ $item }},
                                    @endforeach
                                @else
                                    {{ $pelayanan_pasiens->kajian_pasiens->tidur_istirahat }}
                                @endif
                            </strong>
                        </div>
                    </div>
                    <div class="form-group row">
                        <p class="col-sm-3 col-form-label">Mental</p>
                        <div class="col-sm-5" style="margin-top:0.5em">
                            <strong class="col-sm-3 col-form-label">:
                                @php
                                    $mental = json_decode($pelayanan_pasiens->kajian_pasiens->mental);
                                @endphp
                                @if (is_array($mental) || is_object($mental))
                                    @foreach ($mental as $item)
                                        {{ $item }},
                                    @endforeach
                                @else
                                    {{ $pelayanan_pasiens->kajian_pasiens->mental }}
                                @endif
                            </strong>
                        </div>
                    </div>
                    <div class="form-group row">
                        <p class="col-sm-3 col-form-label">Komunikasi dan Budaya</p>
                        <div class="col-sm-5" style="margin-top:0.5em">
                            <strong class="col-sm-3 col-form-label">:
                                @php
                                    $komunikasi = json_decode($pelayanan_pasiens->kajian_pasiens->komunikasi);
                                @endphp
                                @if (is_array($komunikasi) || is_object($komunikasi))
                                    @foreach ($komunikasi as $item)
                                        {{ $item }},
                                    @endforeach
                                @else
                                    {{ $pelayanan_pasiens->kajian_pasiens->komunikasi }}
                                @endif
                            </strong>
                        </div>
                    </div>
                    <div class="form-group row">
                        <p class="col-sm-3 col-form-label">Perawatan Diri Sehari-hari</p>
                        <div class="col-sm-5" style="margin-top:0.5em">
                            <strong class="col-sm-3 col-form-label">:
                                @php
                                    $perawatan_diri = json_decode($pelayanan_pasiens->kajian_pasiens->perawatan_diri);
                                @endphp
                                @if (is_array($perawatan_diri) || is_object($perawatan_diri))
                                    @foreach ($perawatan_diri as $item)
                                        {{ $item }},
                                    @endforeach
                                @else
                                    {{ $pelayanan_pasiens->kajian_pasiens->perawatan_diri }}
                                @endif
                            </strong>
                        </div>
                    </div>
                    <div class="form-group row">
                        <p class="col-sm-3 col-form-label">Kebersihan Diri</p>
                        <div class="col-sm-5" style="margin-top:0.5em">
                            <strong class="col-sm-3 col-form-label">:
                                @php
                                    $kebersihan_diri = json_decode($pelayanan_pasiens->kajian_pasiens->kebersihan_diri);
                                @endphp
                                @if (is_array($kebersihan_diri) || is_object($kebersihan_diri))
                                    @foreach ($kebersihan_diri as $item)
                                        {{ $item }},
                                    @endforeach
                                @else
                                    {{ $pelayanan_pasiens->kajian_pasiens->kebersihan_diri }}
                                @endif
                            </strong>
                        </div>
                    </div>
                </div>
            </div>
            {{-- End Data Penunjang Form --}}

        </div>
    </div>
    <div class="card">
        <div class="card-body">
            {{-- Start Data Penunjang Form --}}
            <div class="card-header">
                <h3 class="card-title">Data Penunjang Medis Pasien</h3>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <div class="form-group row">
                        <p class="col-sm-3 col-form-label">Laboratorium</p>
                        <div class="col-sm-5" style="margin-top:0.5em">
                            {!! $pelayanan_pasiens->kajian_pasiens->labolatorium !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <div class="form-group row">
                        <p class="col-sm-3 col-form-label">Radiologi</p>
                        <div class="col-sm-5" style="margin-top:0.5em">
                            {!! $pelayanan_pasiens->kajian_pasiens->radiologi !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <div class="form-group row">
                        <p class="col-sm-3 col-form-label">EKG</p>
                        <div class="col-sm-5" style="margin-top:0.5em">
                            {!! $pelayanan_pasiens->kajian_pasiens->ekg !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <div class="form-group row">
                        <p class="col-sm-3 col-form-label">USG</p>
                        <div class="col-sm-5" style="margin-top:0.5em">
                            {!! $pelayanan_pasiens->kajian_pasiens->usg !!}
                        </div>
                    </div>
                </div>
            </div>
            {{-- End Data Penunjang Form --}}

        </div>
    </div>
@endsection
