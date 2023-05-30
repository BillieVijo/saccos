@extends('layouts.backend.master')

@section('main')
   <main>
    <div class="container-fluid px-4">
        <h2 class="mt-4">Logs</h2>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Manage Logs</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Logs
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Action</th>
                            <th>Date & Time</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($logs as $log)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$log->users->first_name .' '.$log->users->last_name}}</td>
                            <td>{{$log->action}}</td>
                            <td>{{$log->created_at}}</td>                           
                        </tr>   
                        @endforeach                     
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection