@extends('layouts.backend.master')

@section('main')
<main>
    <div class="container-fluid px-4">
        <h2 class="mt-4">Users</h2>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Users</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Edit Users
            </div>
            <div class="card-body">
                <div class="row">
                        <form role="form" action="{{route('user.update',$user->id)}}" method="POST">
                            @csrf
                            @method('patch')
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>First name</label>
                                        <input type="text" name="first_name" class="form-control" value="{{$user->first_name}}" placeholder="First Name"> 
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>Middle name</label>
                                        <input type="text" name="middle_name" class="form-control" value="{{$user->middle_name}}" placeholder="Middle Name"> 
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>Last name</label>
                                        <input type="text" name="last_name" class="form-control" value="{{$user->last_name}}" placeholder="Last Name"> 
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>User Name</label>
                                        <input type="text" name="name" class="form-control" value="{{$user->username}}" placeholder="User Name">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control" value="{{$user->email}}" placeholder="Email" readonly>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>Role</label>
                                        <select name="role" id="role_id" class="form-control form-select">
                                            <option value="" readonly>-- Choose Role --</option>
                                            @foreach ($roles as $role)
                                                <option value="{{$role->id}}" {{$role->id == $user->role_id ? 'selected' : ''}}>{{$role->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <button type="submit" name="userUpdate" class="btn btn-primary pull-right mt-3">Update</button>
                           
                        </form>
                    
                    <!-- /.col-lg-6 (nested) -->
                    
                </div>
                <!-- /.row (nested) -->
            </div>
        </div>
    </div>
</main>
@endsection