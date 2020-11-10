@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Admin Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h1>Welcome, Admin!</h1>
                        
                        <br>
                        <br>
                        <h3>Users List</h3>
                        <table class="table table-striped">
                            <tr>
                            <td>Id</td>
                            <td>Name</td>
                            <td>Email</td>
                            <td>
                                #
                            </td>
                            </tr>
                            @foreach ($users as $user)
                            <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a class="btn btn-danger" href="{{route('admin.add', ['id' => $user->id])}}">
                                Make Admin
                                </a>
                            </td>
                            </tr>
                            @endforeach
                            </table>


                            <br>
                        <br>
                        <h3>Admins List</h3>
                        <table class="table table-striped">
                            <tr>
                            <td>Id</td>
                            <td>Name</td>
                            <td>Email</td>
                            <td>
                                #
                            </td>
                            </tr>
                            @foreach ($admins as $admin)
                            <tr>
                            <td>{{ $admin->id }}</td>
                            <td>{{ $admin->name }}</td>
                            <td>{{ $admin->email }}</td>
                            <td>
                                <a class="btn btn-danger" href="{{route('admin.remove', ['id' => $admin->id])}}">
                                    Remove Admin
                                    </a>
                            </td>
                            </tr>
                            @endforeach
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
