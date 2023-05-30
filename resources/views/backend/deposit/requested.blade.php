@extends('layouts.backend.master')

@section('main')
   <main>
    <div class="container-fluid px-4">
        <h2 class="mt-4">Deposits</h2>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Manage Deposits</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Deposits                
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($deposits as $deposit)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$deposit->amount}}</td>
                            <td>{{$deposit->status}}</td>
                            <td>{{$deposit->created_at}}</td>
                            <td>
                                <div class="row">                                    
                                    <div class="col-3">
                                        <form action="{{route('deposit.update',$deposit->id)}}" method="POST">
                                            @csrf
                                            @method('patch')
                                            <button class="btn btn-success btn-sm" onclick="return confirm('are you sure you want to approve this Deposit?');">
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