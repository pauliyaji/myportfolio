@extends('layouts/layout')

@section('content')

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Clients</h1>

                <div class="row">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h4 class="m-0 font-weight-bold text-primary">Clients
                                <a href="{{ route("clients.create") }}" class="float-right btn btn-success btn-sm" style="float: right">Add New</a>
                            </h4>
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
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th></th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($clients)
                                        @foreach($clients as $client)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $client->name }}</td>
                                                <td><img src="{{ asset('storage/'.$client->image) }}" alt="client-logo" width="60px" height="40px"></td>

                                                <td>
                                                    @can('user-edit')
                                                        <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                                    @endcan
                                                    @can('user-delete')
                                                        <form action="{{ route('clients.destroy', $client->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this data?');" style="display: inline-block;">
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

