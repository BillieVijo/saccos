<?php

namespace App\Http\Controllers;

use App\Models\AuditTrail;
use Illuminate\Http\Request;

class AuditTrailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logs = AuditTrail::get();
        return view('backend.logs.index',compact('logs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AuditTrail  $auditTrail
     * @return \Illuminate\Http\Response
     */
    public function show(AuditTrail $auditTrail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AuditTrail  $auditTrail
     * @return \Illuminate\Http\Response
     */
    public function edit(AuditTrail $auditTrail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AuditTrail  $auditTrail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AuditTrail $auditTrail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AuditTrail  $auditTrail
     * @return \Illuminate\Http\Response
     */
    public function destroy(AuditTrail $auditTrail)
    {
        //
    }
}
