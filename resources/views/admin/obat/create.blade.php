@extends('components.index')

@section('body')
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Tambah Obat</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href={{ route('admin-obat.index') }}>Obat</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Tambah Obat</a></li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {{-- Start Form --}}
                    <form action={{ route('admin-obat.store') }} method="POST">
                        @csrf
                        <div class="card-header">
                            <h3 class="card-title">Obat</h3>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Tanggal Masuk Obat</label>
                                    <div class="col-sm-5">
                                        <input type="date" class="form-control" name="tanggal_masuk"
                                            value="{{ old('tanggal_masuk') }}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nama Obat</label>
                                    <div class="col-sm-5">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="name"
                                            value="{{ old('name') }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Sediaan</label>
                                    <div class="col-sm-5">
                                        <select class="form-control" name="sediaan" id="tipeObat" required>
                                            <option> --- Pilih Sediaan --- </option>
                                            <option value="Tablet"
                                                @if (old('sediaan') == 'Tablet') {{ 'selected' }} @endif>Tablet</option>
                                            <option value="Syrop"
                                                @if (old('sediaan') == 'Syrop') {{ 'selected' }} @endif>Syrop</option>
                                            <option value="Capsul"
                                                @if (old('sediaan') == 'Capsul') {{ 'selected' }} @endif>Capsul</option>
                                            <option value="Supp"
                                                @if (old('sediaan') == 'Supp') {{ 'selected' }} @endif>Supp</option>
                                            <option value="Pil"
                                                @if (old('sediaan') == 'Pil') {{ 'selected' }} @endif>Pil</option>
                                            <option value="Injeksi"
                                                @if (old('sediaan') == 'Injeksi') {{ 'selected' }} @endif>Injeksi
                                            </option>
                                            <option value="Puyer"
                                                @if (old('sediaan') == 'Puyer') {{ 'selected' }} @endif>Puyer</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Tanggal Kadaluarsa Obat</label>
                                    <div class="col-sm-5">
                                        <input type="date" class="form-control" name="tanggal_kadaluarsa"
                                            value="{{ old('tanggal_kadaluarsa') }}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Harga</label>
                                    <div class="col-sm-5">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">Rp.</div>
                                            </div>
                                            <input type="number" class="form-control" name="harga"
                                                value="{{ old('harga') }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Stok</label>
                                    <div class="col-sm-5">
                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control" name="stok_lama"
                                                value="{{ old('stok_lama') }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row" hidden>
                                    <label class="col-sm-3 col-form-label">Stok Baru</label>
                                    <div class="col-sm-5">
                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control" name="stok_baru"
                                                value="0" required>
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
