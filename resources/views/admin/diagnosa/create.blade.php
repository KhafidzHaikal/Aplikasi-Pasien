@extends('components.index')

@section('body')
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Tambah Diagnosa</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href={{ route('admin-diagnosa.index') }}>Diagnosa</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Tambah Diagnosa</a></li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {{-- Start Form --}}
                    <form action={{ route('admin-diagnosa.store') }} method="POST">
                        @csrf
                        <div class="card-header">
                            <h3 class="card-title">Diagnosa</h3>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Kode Diagnosa</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="kode_sdki"
                                            value="{{ old('kode_sdki') }}" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nama Diagnosa</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="nama_sdki"
                                            value="{{ old('nama_sdki') }}" required>
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
