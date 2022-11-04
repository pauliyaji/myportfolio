@extends('layouts/layout')

@section('content')

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Permissions</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Permissions</li>
                </ol>
                <div class="row">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Permissions
                                <a href="{{ route("permissions.create") }}" class="float-right btn btn-success btn-sm" style="float: right">Add New</a>
                            </h6>
                        </div>
                        <div class="card-body">
                            @if(Session::has('success'))
                                <p class="text-success">{{ Session('success') }}</p>
                            @endif

                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @if($permissions)
                                        @foreach($permissions as $permission)
                                            <tr>
                                                <td>{{ $permission->id }}</td>
                                                <td>{{ $permission->name }}</td>
                                                <td>
                                                    @can('permission-edit')
                                                    <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                                   @endcan
                                                        @can('permission-delete')
                                                    <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this data?');" style="display: inline-block;">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-trash"></i></button>
                                                    </form>
                                                         @endcan
                                                </td>
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
