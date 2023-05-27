@extends('layouts.backend.master')

@section('main')
    <main>
        <div class="container-fluid px-4">
            <h2 class="mt-4">Members</h2>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Members</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Member View
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <div class="row">
                                <div class="col-6">
                                    <b>First name:</b>
                                </div>
                                <div class="col-6">
                                    <p>{{ $member->users->first_name }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="row">
                                <div class="col-6">
                                    <b>Middle name:</b>
                                </div>
                                <div class="col-6">
                                    <p>{{ $member->users->middle_name }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="row">
                                <div class="col-6">
                                    <b>Last name:</b>
                                </div>
                                <div class="col-6">
                                    <p>{{ $member->users->last_name }}</p>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-4">
                            <div class="row">
                                <div class="col-6">
                                    <b>Address:</b>
                                </div>
                                <div class="col-6">
                                    <p>{{ $member->address }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="row">
                                <div class="col-6">
                                    <b>Email:</b>
                                </div>
                                <div class="col-6">
                                    <p>{{ $member->users->email }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="row">
                                <div class="col-6">
                                    <b>Member Number:</b>
                                </div>
                                <div class="col-6">
                                    <p>{{ $member->member_number }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <div class="row">
                                <div class="col-6">
                                    <b>Registered year:</b>
                                </div>
                                <div class="col-6">
                                    <p>{{ $member->registered_year }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="row">
                                <div class="col-6">
                                    <b>Balance:</b>
                                </div>
                                <div class="col-6">
                                    <p>{{ $member->balance_amount }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="row">
                                <div class="col-6">
                                    <b>Loan:</b>
                                </div>
                                <div class="col-6">
                                    <p>{{ $member->loan_amount }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <div class="row">
                                <div class="col-6">
                                    <b>Deposit:</b>
                                </div>
                                <div class="col-6">
                                    <p>{{ $member->deposit_amount }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.row (nested) -->
                </div>
            </div>
        </div>
    </main>
@endsection
