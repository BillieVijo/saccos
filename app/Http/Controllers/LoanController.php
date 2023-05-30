<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Member;
use App\Models\AuditTrail;
use Illuminate\Http\Request;

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
        return view('backend.loan.my_loans',compact('loans'));
    }

    public function showRequested()
    {
        $loans = Loan::where('status', 'REQUESTED')->get();
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'amount' => 'required', 
        ]);

        //check if the member ana balance ya bond
        $member = Member::where('user_id', auth()->user()->id)->first();

        // return $member->balance_amount;
                       
        if($member->balance_amount == 0.00){
            return redirect()->back()->withErrors(['errors'=>'Your balance does not suppport your Loan Request'])->withInput();
        }elseif($member->balance_amount < $request->amount){
            return redirect()->back()->withErrors(['errors'=>'You cannot Loan Amount more than your balance'])->withInput();
        }else{
            $loan = Loan::create([
                'amount' => $request->amount,
                'member_id' => auth()->user()->id,
                'status' => 'REQUESTED'
            ]);

            if($loan){
                $member->update([
                    'loan_amount'=> $member->loan_amount + $request->amount,
                    'balance_amount'=> $member->balance_amount - $request->amount,
                ]);
            }
        }

        AuditTrail::create([
            'user_id' => auth()->user()->id,
            'action' => 'Request Loan of '.$request->amount.' TSH',
        ]);

        return redirect(route('loan.index'));
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
