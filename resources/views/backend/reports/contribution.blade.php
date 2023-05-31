@extends('layouts.backend.master')

@section('main')
    <main>
        <div class="container-fluid px-4">
            <h2 class="mt-4">Contributions</h2>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Manage Contributions</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Contributions
                    <a href="{{route('deposit.export')}}" class="btn btn-success btn-sm float-end"><i class="fas fa-file-excel"></i> EXPORT</a>
                </div>
                <div class="card-body">
                    <h1>Contribution Report</h1>

                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Member Name</th>
                                <th>Contribution Amount</th>
                                <th>Contribution Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contributions as $contribution)
                                <tr>
                                    <td>{{ $contribution->users->first_name ." ".$contribution->users->middle_name ." ".$contribution->users->last_name  }}</td>
                                    <td>{{ $contribution->amount }}</td>
                                    <td>{{ $contribution->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
