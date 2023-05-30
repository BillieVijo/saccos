@extends('layouts.backend.master')

@section('main')
   <main>
    <div class="container-fluid px-4">
        <h2 class="mt-4">Loans</h2>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Manage Loans</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Loans
                <a href="{{route('loan.create')}}" class="btn btn-success btn-sm float-end"><i class="fas fa-plus"></i> Add Loan</a>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Application Date</th>
                            {{-- <th>Action</th> --}}
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($loans as $loan)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$loan->amount}}</td>
                            <td>{{$loan->status}}</td>
                            <td>{{$loan->created_at}}</td>
                                                       
                        </tr>   
                        @endforeach                     
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection