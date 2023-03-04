@extends('components.index')

@section('body')
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Tambah Stok Obat</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href={{ route('obat.index') }}>Obat</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Tambah Obat</a></li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {{-- Start Form --}}
                    <form action={{ route('obat.storeStok') }} method="POST">
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
                                    <label class="col-sm-3 col-form-label">Obat</label>
                                    <div class="col-sm-5">
                                        <select class="form-control" name="obats_no_obat" id="icd">
                                            <option selected> --- Pilih Obat --- </option>
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
                                    <label class="col-sm-3 col-form-label">Stok</label>
                                    <div class="col-sm-5">
                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control" name="stok"
                                                value="{{ old('stok') }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Sumber Dana</label>
                                    <div class="col-sm-5">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="sumber_dana"
                                                value="{{ old('sumber_dana') }}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </div>
                        </div>
                    </form>
                    {{-- End Form --}}
                </div>
            </div>
        </div>
    </div>
@endsection
