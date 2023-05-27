<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\Member;
use Illuminate\Http\Request;

class DepositController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deposits = Deposit::where('member_id',auth()->user()->id)->get();
        return view('backend.deposit.index',compact('deposits'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'amount' => 'required', 
        ]);
        //check the member 
        $member = Member::where('user_id', auth()->user()->id)->first();

        $deposit = Deposit::create([
            'amount' => $request->amount,
            'member_id' => auth()->user()->id,
            'status' => 'SAVED'
        ]);

        //escape negative number
        $x = 0;
        if($member->loan_amount - $request->amount < 0){
            $x = 0;
        }else{
            $x = $member->loan_amount - $request->amount;
        }

        if($deposit){
            $member->update([
                'loan_amount'=> $x,
                'deposit_amount'=> $member->deposit_amount + $request->amount,
                'balance_amount'=> $member->balance_amount + $request->amount,
            ]);
        }

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
        //
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
