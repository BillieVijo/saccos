@extends('layouts.backend.master')

@section('main')
   <main>
    <div class="container-fluid px-4">
        <h2 class="mt-4">Members</h2>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Manage Members</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Members 
                <a href="{{route('member.create')}}" class="btn btn-success btn-sm float-end"><i class="fas fa-plus"></i> Add Member</a>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>memberNo</th>
                            <th>Share</th>
                            <th>Balance</th>
                            <th>loan</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($members as $member)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$member->users->first_name}}</td>
                            <td>{{$member->users->last_name}}</td>
                            <td>{{$member->users->username}}</td>
                            <td>{{$member->share}}</td>
                            <td>{{$member->balance_amount}}</td>
                            <td>{{$member->loan_amount}}</td>
                            <td>{{$member->users->email}}</td>
                            <td>{{$member->users->roles->name}}</td>
                            <td>
                                <div class="row">
                                    <div class="col-4">
                                        <a href="{{route('member.show',$member->id)}}" class="btn btn-info btn-sm">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        
                                    </div>
                                    <div class="col-3">
                                        <form action="{{route('member.destroy',$member->id)}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm" onclick="return confirm('are you sure you want to delete this member?');">
                                                <i class="fa fa-trash"></i>
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