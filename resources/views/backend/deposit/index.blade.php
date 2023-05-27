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
                <a href="{{route('deposit.create')}}" class="btn btn-success btn-sm float-end"><i class="fas fa-plus"></i> Add Deposit</a>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Saving Date</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($deposits as $deposit)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$deposit->amount}}</td>
                            <td>{{$deposit->status}}</td>
                            <td>{{$deposit->created_at}}</td>
                                                       
                        </tr>   
                        @endforeach                     
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection