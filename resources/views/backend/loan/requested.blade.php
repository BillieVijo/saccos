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
                            <th>Application Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($loans as $loan)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$loan->users->first_name .' '.$loan->users->last_name}}</td>
                            <td>{{$loan->users->username}}</td>
                            <td>{{$loan->amount}}</td>
                            <td>{{$loan->status}}</td>
                            <td>{{$loan->created_at}}</td>
                            <td>
                                <div class="row">                                    
                                    <div class="col-3">
                                        <form action="{{route('loan.update',$loan->id)}}" method="POST">
                                            @csrf
                                            @method('patch')
                                            <button class="btn btn-success btn-sm" onclick="return confirm('are you sure you want to approve this Loan?');">
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