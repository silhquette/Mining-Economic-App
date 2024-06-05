<?php

namespace App\Http\Controllers;

use App\Models\Cashflow;
use App\Http\Requests\StoreCashflowRequest;
use App\Http\Requests\UpdateCashflowRequest;
use App\Models\Project;

class CashflowController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(Project $project)
    {
        return view('cashflow.edit', [
            'project' => $project
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCashflowRequest $request, Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cashflow $cashflow)
    {
        return view('cashflow.edit', [
            'cashflow' => $cashflow
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCashflowRequest $request, Cashflow $cashflow, Project $project)
    {
        $validated = $request->validate();

        $cashflow->update($validated);

        return redirect()->route('project.show', $project->id)->with(['success' => 'Project berhasil ditambahkan']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cashflow $cashflow)
    {
        $cashflow->delete();

        return redirect()->back()->with(['success' => 'Cashflow berhasil dihapus']);
    }
}
