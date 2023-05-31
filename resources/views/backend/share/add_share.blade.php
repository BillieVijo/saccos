@extends('layouts.backend.master')

@section('main')
<main>
    <div class="container-fluid px-4">
        <h2 class="mt-4">Shares</h2>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Shares</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Shares Add
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger alert-dismissible fade show">
                            {{$error}}
                            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endforeach
                    <div class="col-lg-6">
                        <form role="form" action="{{route('share.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Amount</label>
                                <input type="text" name="amount" class="form-control" placeholder="Share Amount">
                                
                            </div>                            
                            <button type="submit" name="shareAdd" class="btn btn-primary pull-right mt-3">Add</button>
                           
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