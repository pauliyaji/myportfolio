@extends('layouts/layout')

@section('content')

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Clients</h1>

                <div class="row">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Clients
                                <a href="{{ route("clients.index") }}" class="float-right btn btn-success btn-sm" style="float: right">View All</a>
                            </h6>
                        </div>
                        <div class="card-body">

                            @if(Session::has('success'))
                                <p class="text-success">{{session('success')}}</p>
                            @endif
                            <div class="table-responsive">
                                <form method="post" action="{{ route('clients.update', $client->id) }}" enctype="multipart/form-data">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        @csrf
                                        @method('patch')
                                        <tr>
                                            <th>Name</th>
                                            <td><input type="text" class="form-control" value="{{ $client->name }}" name="name" id="name"/>
                                                <br/>
                                                @error('name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror</td>
                                        </tr>
                                        <tr>
                                            <th>Current Image/Logo</th>
                                            <td><img src="{{ asset('storage/'.$client->image) }}" alt="client-logo" width="120px" height="100px"></td>
                                        </tr>
                                        <tr>
                                            <th>Change Image/Logo</th>
                                            <td><input type="file" name="image" id="image" />
                                                <br/>
                                                @error('image')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
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
