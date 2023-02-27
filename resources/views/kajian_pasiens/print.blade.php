<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>{{ $title }}</title>
    <!-- Favicon icon -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    {{-- <link rel="stylesheet" href="css/pdf.css"> --}}
    <link rel="stylesheet" href="css/pdf-kajian.css">
</head>

<body>
    <style>
        .kop-surat div{
            line-height: 10%
        }
    </style>
    <div class="kop-surat">
        <img class="pemkab" src="{{ public_path('img/pemkab.png') }}" style="width: 6em; height: 6em">
        <div>
            <h3>PEMERINTAH KABUPATEN CIREBON</h3>
            <h3>DINAS KESEHATAN KABUPATEN CIREBON</h3>
            <h1>UPTD PUSKESMAS PANGURAGAN</h1>
            <p>Jln. Nyimas Gandasari No 85 Panguragan Kulon</p>
            <p>Kec. Panguragan Kab. Cirebon Telp. (0231) 88350109 Email : pkm.panguragancirebonkab.go.id 45163</p>
        </div>
        <img class="puskesmas" src="{{ public_path('img/puskesmas.png') }}" style="width: 6em; height: 6em">
        <div class="line-2"></div>
        <div class="line-3"></div>
    </div>
    <h1 style="text-align: center">IDENTITAS PASIEN</h1>
    <hr>
    <div class="header-left">
        <div style="display: block">
            <p><strong>No.
                    Reg</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                {{ $kajianPasien->pasiens->no_rm }}</p>
            <p><strong>Nama Penderita</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $kajianPasien->pasiens->name }}</p>
            <p><strong>Tanggal Lahir</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                {{ $kajianPasien->pasiens->tanggal_lahir->translatedFormat('d F Y') }}</p>
        </div>
    </div>
    <div class="header-right">
        <div style="display: block">
            <p><strong>Tanggal Kunjungan</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                {{ $kajianPasien->tanggal_pemeriksaan->translatedFormat('d F Y') }}</p>
            <p><strong>Nama Kepala Keluarga</strong>&nbsp;&nbsp;&nbsp;: {{ $kajianPasien->pasiens->nama_kk }}</p>
            <p><strong>Nama
                    Petugas</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                {{ $kajianPasien->users->name }}</p>
        </div>
    </div>
    <h1 style="text-align: center;">PEMERIKASAAN FISIK</h1>
    <hr>
    <div class="header-left">
        <div style="display: block">
            <p><strong>Tensi</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                {{ $kajianPasien->tensi }} mmHg</p>
            <p><strong>Nadi</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                {{ $kajianPasien->nadi }} x/menit</p>
            <p><strong>Berat
                    Badan</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                {{ $kajianPasien->bb }} Kg</p>
            <p><strong>Tinggi
                    Badan</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                {{ $kajianPasien->tb }} cm</p>
        </div>
    </div>
    <div class="header-right">
        <div style="display: block">
            <p><strong>Resp</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                {{ $kajianPasien->resp }} x/menit</p>
            <p><strong>Suhu</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                {{ $kajianPasien->suhu }} <sup>o</sup>C</p>
            <p><strong>Indeks Massa Tubuh
                    (IMT)</strong>&nbsp;&nbsp;&nbsp;:
                {{ $kajianPasien->imt }} Kg/M2</p>
            <p><strong>Riwayat Alergi
                    Obat</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                {{ $kajianPasien->pasiens->alergi_obat }} </p>

        </div>
    </div>
    <table style="margin-top: 130px">
        <tbody>
            <th>Sirkulasi/Cairan</th>
            <td style="width:575px">
                @php
                    $sirkulasi_cairan = json_decode($kajianPasien->sirkulasi_cairan);
                @endphp
                @if (is_array($sirkulasi_cairan) || is_object($sirkulasi_cairan))
                    @foreach ($sirkulasi_cairan as $item)
                        {{ $item }},
                    @endforeach
                @else
                    {{ $kajianPasien->sirkulasi_cairan }}
                @endif
            </td>
        </tbody>
        <tbody>
            <th>Perkemihan</th>
            <td style="width:575px">
                @php
                    $perkemihan = json_decode($kajianPasien->perkemihan);
                @endphp
                @if (is_array($perkemihan) || is_object($perkemihan))
                    @foreach ($perkemihan as $item)
                        {{ $item }},
                    @endforeach
                @else
                    {{ $kajianPasien->perkemihan }}
                @endif
            </td>
        </tbody>
        <tbody>
            <th>Pernapasan</th>
            <td style="width:575px">
                @php
                    $pernapasan = json_decode($kajianPasien->pernapasan);
                @endphp
                @if (is_array($pernapasan) || is_object($pernapasan))
                    @foreach ($pernapasan as $item)
                        {{ $item }},
                    @endforeach
                @else
                    {{ $kajianPasien->pernapasan }}
                @endif
            </td>
        </tbody>
        <tbody>
            <th>Pencernaan</th>
            <td style="width:575px">
                @php
                    $pencernaan = json_decode($kajianPasien->pencernaan);
                @endphp
                @if (is_array($pencernaan) || is_object($pencernaan))
                    @foreach ($pencernaan as $item)
                        {{ $item }},
                    @endforeach
                @else
                    {{ $kajianPasien->pencernaan }}
                @endif
            </td>
        </tbody>
        <tbody>
            <th>Muskuloskeletal</th>
            <td style="width:575px">
                @php
                    $muskuloskeletal = json_decode($kajianPasien->muskuloskeletal);
                @endphp
                @if (is_array($muskuloskeletal) || is_object($muskuloskeletal))
                    @foreach ($muskuloskeletal as $item)
                        {{ $item }},
                    @endforeach
                @else
                    {{ $kajianPasien->muskuloskeletal }}
                @endif
            </td>
        </tbody>
        <tbody>
            <th>Neurosensori</th>
            <td style="width:575px" class="gejala-td">
                <ul>
                    <li>Fungsi Penglihatan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                        @php
                            $fungsi_penglihatan = json_decode($kajianPasien->fungsi_penglihatan);
                        @endphp
                        @if (is_array($fungsi_penglihatan) || is_object($fungsi_penglihatan))
                            @foreach ($fungsi_penglihatan as $item)
                                {{ $item }},
                            @endforeach
                        @else
                            {{ $kajianPasien->fungsi_penglihatan }}
                        @endif
                    </li>
                    <li>Fungsi Pendengaran &nbsp;&nbsp;&nbsp;:
                        @php
                            $fungsi_pendengaran = json_decode($kajianPasien->fungsi_pendengaran);
                        @endphp
                        @if (is_array($fungsi_pendengaran) || is_object($fungsi_pendengaran))
                            @foreach ($fungsi_pendengaran as $item)
                                {{ $item }},
                            @endforeach
                        @else
                            {{ $kajianPasien->fungsi_pendengaran }}
                        @endif
                    </li>
                    <li>Fungsi Perasa &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                        @php
                            $fungsi_perasa = json_decode($kajianPasien->fungsi_perasa);
                        @endphp
                        @if (is_array($fungsi_perasa) || is_object($fungsi_perasa))
                            @foreach ($fungsi_perasa as $item)
                                {{ $item }},
                            @endforeach
                        @else
                            {{ $kajianPasien->fungsi_perasa }}
                        @endif
                    </li>
                    <li>Fungsi Perabaan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                        @php
                            $fungsi_perabaan = json_decode($kajianPasien->fungsi_perabaan);
                        @endphp
                        @if (is_array($fungsi_perabaan) || is_object($fungsi_perabaan))
                            @foreach ($fungsi_perabaan as $item)
                                {{ $item }},
                            @endforeach
                        @else
                            {{ $kajianPasien->fungsi_perabaan }}
                        @endif
                    </li>
                    <li>Fungsi Penciuman &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 
                        @php
                            $fungsi_penciuman = json_decode($kajianPasien->fungsi_penciuman);
                        @endphp
                        @if (is_array($fungsi_penciuman) || is_object($fungsi_penciuman))
                            @foreach ($fungsi_penciuman as $item)
                                {{ $item }},
                            @endforeach
                        @else
                            {{ $kajianPasien->fungsi_penciuman }}
                        @endif
                    </li>
                </ul>
            </td>
        </tbody>
        <tbody>
            <th>Kulit</th>
            <td style="width:575px">
                @php
                    $kulit = json_decode($kajianPasien->kulit);
                @endphp
                @if (is_array($kulit) || is_object($kulit))
                    @foreach ($kulit as $item)
                        {{ $item }},
                    @endforeach
                @else
                    {{ $kajianPasien->kulit }}
                @endif
            </td>
        </tbody>
        <tbody>
            <th>Mental</th>
            <td style="width:575px">
                @php
                    $mental = json_decode($kajianPasien->mental);
                @endphp
                @if (is_array($mental) || is_object($mental))
                    @foreach ($mental as $item)
                        {{ $item }},
                    @endforeach
                @else
                    {{ $kajianPasien->mental }}
                @endif
            </td>
        </tbody>
        <tbody>
            <th>Tidur dan Istirahat</th>
            <td style="width:575px">
                @php
                    $tidur_istirahat = json_decode($kajianPasien->tidur_istirahat);
                @endphp
                @if (is_array($tidur_istirahat) || is_object($tidur_istirahat))
                    @foreach ($tidur_istirahat as $item)
                        {{ $item }},
                    @endforeach
                @else
                    {{ $kajianPasien->tidur_istirahat }}
                @endif
            </td>
        </tbody>
        <tbody>
            <th>Komunikasi dan Budaya</th>
            <td style="width:575px">
                @php
                    $komunikasi = json_decode($kajianPasien->komunikasi);
                @endphp
                @if (is_array($komunikasi) || is_object($komunikasi))
                    @foreach ($komunikasi as $item)
                        {{ $item }},
                    @endforeach
                @else
                    {{ $kajianPasien->komunikasi }}
                @endif
            </td>
        </tbody>
        <tbody>
            <th>Kebersihan Diri Sehari-hari</th>
            <td style="width:575px">
                @php
                    $kebersihan_diri = json_decode($kajianPasien->kebersihan_diri);
                @endphp
                @if (is_array($kebersihan_diri) || is_object($kebersihan_diri))
                    @foreach ($kebersihan_diri as $item)
                        {{ $item }},
                    @endforeach
                @else
                    {{ $kajianPasien->kebersihan_diri }}
                @endif
            </td>
        </tbody>
        <tbody>
            <th>Perawatan Diri</th>
            <td style="width:575px">
                @php
                    $perawatan_diri = json_decode($kajianPasien->perawatan_diri);
                @endphp
                @if (is_array($perawatan_diri) || is_object($perawatan_diri))
                    @foreach ($perawatan_diri as $item)
                        {{ $item }},
                    @endforeach
                @else
                    {{ $kajianPasien->perawatan_diri }}
                @endif
            </td>
        </tbody>
    </table>
    
    <h1 style="text-align: center">HASIL PEMERIKSAAN PENUNJANG</h1>
    <hr>
    <table style="width:100%">
        <thead>
            <th style="width: 100%">Laboratorium</th>
            <th style="width: 100%">Radiologi</th>
            <th style="width: 100%">EKG</th>
            <th style="width: 100%">USG</th>
        </thead>
        <tbody>
            <td>{!! $kajianPasien->labolatorium !!}</td>
            <td>{!! $kajianPasien->radiologi !!}</td>
            <td>{!! $kajianPasien->ekg !!}</td>
            <td>{!! $kajianPasien->usg !!}</td>
        </tbody>
    </table>
    <br>
    <p><strong>Nama
            Petugas</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
        {{ $kajianPasien->users->name }}</p>
    <br>
    <p><strong>TTD
            Petugas</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
        ..............
    </p>
</body>

</html>
