@extends('layouts.layout')

@section('content')

    <div id="layoutSidenav_content">
        <main>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Add Role
                        <a href="{{ route('roles.index') }}" class="float-right btn btn-success btn-sm" style="float:right">View All</a>

                    </h6>
                </div>
                <div class="card-body">

                    @if(Session::has('success'))
                        <p class="text-success">{{session('success')}}</p>
                    @endif
                    <div class="table-responsive">
                        <form method="post" action="{{ route('roles.store') }}">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                @csrf
                                <tr>
                                    <th>Name</th>
                                    <td><input type="text" class="form-control" name="name" id="name"/></td>
                                </tr>
                                <tr>
                                    <th>Assign Permissions</th>
                                    <td>
                                        <table class="table table-striped">
                                            <thead>
                                            <th scope="col" width="1%"><input type="checkbox" name="all_permission"></th>
                                            <th scope="col" width="20%">Name</th>
                                            <th scope="col" width="1%">Guard</th>
                                            </thead>

                                            @foreach($permissions as $permission)
                                                <tr>
                                                    <td>
                                                        <input type="checkbox"
                                                               name="permission[{{ $permission->name }}]"
                                                               value="{{ $permission->name }}"
                                                               class='permission'>
                                                    </td>
                                                    <td>{{ $permission->name }}</td>
                                                    <td>{{ $permission->guard_name }}</td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <input type="submit" class="btn btn-primary btn-sm" />
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </main>

@endsection
