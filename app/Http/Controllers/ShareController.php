<?php

namespace App\Http\Controllers;

use App\Models\Share;
use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Requests\StoreShareRequest;
use App\Models\AuditTrail;

class ShareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shares = Share::get();
        return view('backend.share.index',compact('shares'));
    }

    public function showShareMade()
    {
        $shares = Share::where('status', 'ON-PROGRESS')->get();
        return view('backend.share.requested', compact('shares'));
    }

    public function showMyShares()
    {
        $shares = Share::where('member_id', auth()->user()->id)->get();
        return view('backend.share.my_shares', compact('shares'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.share.add_share');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreShareRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreShareRequest $request)
    {
        $deposit = Share::create([
            'amount' => $request->amount,
            'member_id' => auth()->user()->id,
            'status' => 'ON-PROGRESS'
        ]);

        AuditTrail::create([
            'user_id' => auth()->user()->id,
            'action' => 'Make Share Buy request of '.$request->amount.' Share(s)',
        ]);

        return redirect(route('share.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Share  $share
     * @return \Illuminate\Http\Response
     */
    public function show(Share $share)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Share  $share
     * @return \Illuminate\Http\Response
     */
    public function edit(Share $share)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Share  $share
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Share $share)
    {
        $share->update([
            'status' => 'APPROVED',
        ]);

        // Retrieve the member associated with the share
        $member = Member::where('user_id',$share->member_id)->first();

        // Unfreeze the deposit amount by and add balance 
        if ($member) {
            $member->update([
                'share' => $member->share - $share->amount,
            ]);
        }

        AuditTrail::create([
            'user_id' => auth()->user()->id,
            'action' => 'Approve Share of '.$share->amount,
        ]);

        return redirect(route('share.made'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Share  $share
     * @return \Illuminate\Http\Response
     */
    public function destroy(Share $share)
    {
        //
    }
}
