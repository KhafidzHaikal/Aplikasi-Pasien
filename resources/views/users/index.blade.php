@extends('components.index')

@section('body')
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>User</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
            </ol>
        </div>
    </div>
    <a class="btn btn-primary col-2 mb-xl-2" style="color:#ffff" href={{ route('users.create') }}>Tambah User</a>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tabel User</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="myTable" class="display" style="min-width: 100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->username }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->type }}</td>
                                        <td>
                                            {{-- <a href={{ route('users.edit', $item->id ) }} class="btn btn-warning"><i class="bi bi-pencil-square"></i></a> --}}
                                            <form action={{ route('users.destroy', $item->id) }} method="POST">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-danger"><i
                                                        class="bi bi-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
