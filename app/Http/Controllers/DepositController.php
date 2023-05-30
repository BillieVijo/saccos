<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\Member;
use App\Models\AuditTrail;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDepositRequest;

class DepositController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deposits = Deposit::get();
        return view('backend.deposit.index',compact('deposits'));
    }

    public function showDepositMade()
    {
        $deposits = Deposit::where('status', 'REQUESTED')->get();
        return view('backend.deposit.requested', compact('deposits'));
    }

    public function showMyDeposits()
    {
        $deposits = Deposit::where('member_id', auth()->user()->id)->get();
        return view('backend.deposit.my_deposits', compact('deposits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.deposit.add_deposit');        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDepositRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDepositRequest $request)
    {
        Deposit::create([
            'amount' => $request->amount,
            'member_id' => auth()->user()->id,
            'status' => 'REQUESTED'
        ]);

        AuditTrail::create([
            'user_id' => auth()->user()->id,
            'action' => 'Make Deposit request of '.$request->amount.' TSH',
        ]);

        return redirect(route('deposit.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function show(Deposit $deposit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function edit(Deposit $deposit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Deposit $deposit)
    {
        $deposit->update([
            'status' => 'APPROVED',
        ]);

        // Retrieve the member associated with the deposit
        $member = Member::where('user_id',$deposit->member_id)->first();

        // Unfreeze the deposit amount by and add balance 
        if ($member) {
            $member->update([
                'frozen_amount' => $member->frozen_amount - $deposit->amount,
                'balance_amount' => $member->balance_amount + $deposit->amount,
                'loan_amount' => $member->loan_amount - $deposit->amount,
            ]);
        }

        AuditTrail::create([
            'user_id' => auth()->user()->id,
            'action' => 'Approve Deposit of '.$deposit->amount.' TSH',
        ]);

        return redirect(route('deposit.made'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Deposit $deposit)
    {
        //
    }
}
