@extends('layouts.backend.master')

@section('main')
<main>
    <div class="container-fluid px-4">
        <h2 class="mt-4">Roles</h2>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Roles</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Edit Roles
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <form role="form" action="{{route('role.update',$role->id)}}" method="POST">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <label>Role Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Role Name" value="{{$role->name}}">
                                
                            </div>
                            
                            <button type="submit" name="roleUpdate" class="btn btn-primary pull-right mt-3">Update</button>
                           
                        </form>
                    </div>
                    <!-- /.col-lg-6 (nested) -->
                    
                </div>
                <!-- /.row (nested) -->
            </div>
        </div>
    </div>
</main>
@endsection