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
                                <a href="{{ route("users.index") }}" class="float-right btn btn-success btn-sm" style="float: right">View All</a>
                            </h6>
                        </div>
                        <div class="card-body">

                            @if(Session::has('success'))
                                <p class="text-success">{{session('success')}}</p>
                            @endif
                            <div class="table-responsive">
                                <form method="post" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        @csrf
                                        @method('patch')
                                        <tr>
                                            <th>Full Name</th>
                                            <td><input type="text" class="form-control" value="{{ $user->name }}" name="name" id="name"/></td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td><input type="text" class="form-control" value="{{ $user->email }}" name="email" id="email"/></td>
                                        </tr>
                                        <tr>
                                            <th>Password</th>
                                            <td><input type="password" class="form-control" name="password" id="password"/></td>
                                        </tr>

                                        <tr>
                                            <th>Role</th>
                                            <td>
                                                <select class="form-control"
                                                        name="role" required>
                                                    <option value="">Select role</option>
                                                    @foreach($roles as $role)
                                                        <option value="{{ $role->id }}"
                                                            {{ in_array($role->name, $userRole)
                                                                ? 'selected'
                                                                : '' }}>{{ $role->name }}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('role'))
                                                    <span class="text-danger text-left">{{ $errors->first('role') }}</span>
                                                @endif
                                            </td>

                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <input type="submit" class="btn btn-primary btn-sm" />                                </td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </main>

@endsection
