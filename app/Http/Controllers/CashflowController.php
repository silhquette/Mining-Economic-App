<?php

namespace App\Http\Controllers;

use App\Models\Cashflow;
use App\Http\Requests\StoreCashflowRequest;
use App\Http\Requests\UpdateCashflowRequest;
use App\Models\Project;

class CashflowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Project $project)
    {
        return $project;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCashflowRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Cashflow $cashflow)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cashflow $cashflow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCashflowRequest $request, Cashflow $cashflow)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cashflow $cashflow)
    {
        //
    }
}
