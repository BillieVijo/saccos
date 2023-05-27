@extends('layouts.backend.master')

@section('main')
<main>
    <div class="container-fluid px-4">
        <h2 class="mt-4">Staffs</h2>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Staffs</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Staff Add
            </div>
            <div class="card-body">
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissible fade show">
                        {{$error}}
                        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endforeach
                <div class="row">
                    
                        <form role="form" action="{{route('user.store')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>First name</label>
                                        <input type="text" name="first_name" class="form-control" value="{{old('first_name')}}" placeholder="First Name"> 
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>Middle name</label>
                                        <input type="text" name="middle_name" class="form-control" value="{{old('middle_name')}}" placeholder="Middle Name"> 
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>Last name</label>
                                        <input type="text" name="last_name" class="form-control" value="{{old('last_name')}}" placeholder="Last Name"> 
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>User Name</label>
                                        <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="User Name">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control" value="{{old('email')}}" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>Role</label>
                                        <select name="role" id="role_id" class="form-control form-select">
                                            <option value="" readonly>-- Choose Role --</option>
                                            @foreach ($roles as $role)
                                                <option value="{{$role->id}}">{{$role->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                
                            </div>
                            
                            <button type="submit" name="userAdd" class="btn btn-primary pull-right mt-3">Save</button>
                           
                        </form>
                    
                    
                </div>
                <!-- /.row (nested) -->
            </div>
        </div>
    </div>
</main>
@endsection