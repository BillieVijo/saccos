<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Member::get();
        return view('backend.member.index',compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.member.add_member');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $u = User::orderBy('id','DESC')->first();
        
        $this->validate($request, [
            'first_name' => 'required', 
            'last_name' => 'required', 
            'email' => 'required|unique:users', 
            'address' => 'required', 
            'year' => 'required', 
        ]);
        $user = User::create([
            'first_name' => ucfirst($request->first_name),
            'middle_name' => ucfirst($request->middle_name),
            'last_name' => ucfirst($request->last_name),
            'email' => $request->email,
            'role_id' => 3,
            'password' => bcrypt(strtoupper($request->last_name)),
            'username' => $this->generateMemberNumber($u->id, 5),
        ]);

        if($user){
            Member::create([
                'user_id' => $user->id,
                'member_number' => $user->username,
                'address' => ucfirst($request->address),
                'registered_year' => $request->year,
            ]);
        }

        return redirect(route('member.index')); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        return view('backend.member.view_member',compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        
        $member->delete();
        User::find($member->user_id)->delete();
        return redirect(route('member.index'));
    }

    public function generateMemberNumber($id, $limit){
        $limit = $limit ? $limit : 10;
        $pad = '0';

        $pad_value = $limit - strlen($id);
        if($pad_value == 0){
            return $value;
        }else {
            try {
                $padder = str_repeat($pad, $pad_value);
            } catch (\Exception $e) {
                $padder = str_repeat($pad, 10);
            }
            return 'SACCOS-'.$padder. $id;
        }
        return 'SACCOS-'.$id;
}
}
