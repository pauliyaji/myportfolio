@extends('layouts/layout')

@section('content')

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Users</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Users</li>
                </ol>
                <div class="row">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Users
                                <a href="{{ route("users.create") }}" class="float-right btn btn-success btn-sm" style="float: right">Add New</a>
                            </h6>
                        </div>
                        <div class="card-body">
                            @if(Session::has('success'))
                                <p class="text-success">{{ Session('success') }}</p>
                            @endif

                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>Roles</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>Roles</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @if($users)
                                        @foreach($users as $user)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email  }}</td>
                                                <td>
                                                    @foreach($user->roles as $role)
                                                        <span class="btn btn-success btn-sm btn-block">{{ $role->name }}</span>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @can('user-show')
                                                        <a href="{{ route('users.show', $role->id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                                    @endcan
                                                        @can('user-edit')
                                                        <a href="{{ route('users.edit', $role->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                                    @endcan
                                                    @can('user-delete')
                                                        <form action="{{ route('users.destroy', $role->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this data?');" style="display: inline-block;">
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                            <button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-trash"></i></button>
                                                        </form>
                                                    @endcan                                               </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </main>

@endsection
