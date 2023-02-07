@extends('components.index')

@section('body')
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Tambah User</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href={{ route('users.index') }}>User</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Tambah User</a></li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action={{ route('users.store') }} method="POST">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Username</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="username" value="{{ old('username') }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-3">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Role</label>
                            <div class="col-sm-3">
                                <select class="form-control" name="type" id="roleSelect2">
                                    <option selected> --- Pilih Role ---- </option>
                                    <option value="0">User</option>
                                    <option value="1">Admin</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row" style="align-items: center">
                            <label class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-3">
                                <input type="password" class="form-control" name="password" id="password" required>
                            </div>
                            <i class="bi bi-eye-slash" id="togglePassword" style="margin-left: -40px; cursor: pointer; z-index:999"></i>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Konfirmasi Password</label>
                            <div class="col-sm-3">
                                <input type="password" class="form-control" @error('password') is-invalid @enderror name="password_confirmation" required autocomplete="current-password">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
