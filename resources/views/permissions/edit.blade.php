@extends('layouts/layout')

@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
                <div class="row">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Edit Permission
                                <a href="{{ route('permissions.index') }}" class="float-right btn btn-success btn-sm" style="float:right">View All</a>
                            </h6>
                        </div>
                        <div class="card-body">

                            @if(Session::has('success'))
                                <p class="text-success">{{session('success')}}</p>
                            @endif
                            <div class="table-responsive">
                                <form method="post" action="{{ route('permissions.update', $permission->id) }}" >
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        @csrf
                                        @method('put')
                                        <tr>
                                            <th>Permission Name</th>
                                            <td><input type="text" class="form-control" value="{{ $permission->name }}" name="name" id="name"/></td>
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
