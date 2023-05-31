<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Member;
use App\Models\AuditTrail;
use Illuminate\Http\Request;
use App\Http\Requests\StoreLoanRequest;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loans = Loan::get();
        return view('backend.loan.index',compact('loans'));
    }

    public function showRequested()
    {
        $loans = Loan::where('status', 'ON-PROGRESS')->get();
        return view('backend.loan.requested', compact('loans'));
    }

    public function showMyLoans()
    {
        $loans = Loan::where('member_id', auth()->user()->id)->get();
        return view('backend.loan.my_loans', compact('loans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.loan.add_loan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLoanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLoanRequest $request)
    {
        // I used StoreLoanRequest to separate validation and simplify thib block of code
        Loan::create([
            'amount' => $request->amount,
            'member_id' => auth()->user()->id,
            'status' => 'ON-PROGRESS'
        ]);
        
        AuditTrail::create([
            'user_id' => auth()->user()->id,
            'action' => 'Request Loan of '.$request->amount.' TSH',
        ]);

        return redirect(route('loan.myLoans'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function show(Loan $loan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function edit(Loan $loan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Loan $loan)
    {
        $loan->update([
            'status' => 'APPROVED',
        ]);
        
        // Retrieve the member associated with the loan
        $member = Member::where('user_id',$loan->member_id)->first();
        
        // Update the member's loan and balance amounts
        if ($member) {
            $member->update([
                'loan_amount' => $member->loan_amount + $loan->amount,
                'balance_amount' => $member->balance_amount - $loan->amount,
                'frozen_amount' => $member->frozen_amount + $loan->amount
            ]);
        }

        AuditTrail::create([
            'user_id' => auth()->user()->id,
            'action' => 'Approve loan of '.$loan->amount.' TSH',
        ]);

        return redirect(route('loan.requested'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Loan $loan)
    {
        //
    }
}
