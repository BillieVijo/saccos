@extends('layouts.backend.master')

@section('main')
   <main>
    <div class="container-fluid px-4">
        <h2 class="mt-4">Staffs</h2>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Manage Staffs</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Staffs 
                <a href="{{route('user.create')}}" class="btn btn-success btn-sm float-end"><i class="fas fa-plus"></i> Add Staff</a>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Firstname</th>
                            {{-- <th>Middlename</th> --}}
                            <th>Lastname</th>
                            <th>userName</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$user->first_name}}</td>
                            {{-- <td>{{$user->middle_name}}</td> --}}
                            <td>{{$user->last_name}}</td>
                            <td>{{$user->username}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->roles->name}}</td>
                            <td>
                                <div class="row {{auth()->user()->role_id == 1 ? '' :'d-none'}}">
                                    <div class="col-4">
                                        <a href="{{route('user.edit',$user->id)}}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        
                                    </div>
                                    <div class="col-3">
                                        <form action="{{route('user.destroy',$user->id)}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm" onclick="return confirm('are you sure you want to delete this user?');">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>                            
                        </tr>   
                        @endforeach                     
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection