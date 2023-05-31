@extends('layouts.backend.master')

@section('main')
   <main>
    <div class="container-fluid px-4">
        <h2 class="mt-4">Shares</h2>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Manage Shares</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Shares                
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Member #</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($shares as $share)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$share->users->first_name .' '.$share->users->last_name}}</td>
                            <td>{{$share->users->username}}</td>
                            <td>{{$share->amount}}</td>
                            <td>{{$share->status}}</td>
                            <td>{{$share->created_at}}</td>
                            <td>
                                <div class="row">                                    
                                    <div class="col-3">
                                        <form action="{{route('share.update',$share->id)}}" method="POST">
                                            @csrf
                                            @method('patch')
                                            <button class="btn btn-success btn-sm" onclick="return confirm('are you sure you want to approve this Share?');">
                                                <i class="fa fa-check"></i>
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