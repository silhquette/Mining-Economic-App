<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Cashflow;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\StoreCashflowRequest;
use App\Http\Requests\UpdateCashflowRequest;

class CashflowController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(Project $project)
    {
        return view('cashflow.create', [
            'project' => $project
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCashflowRequest $request, Project $project)
    {
        try {
            Cashflow::create($request->all());
            return redirect()->route('project.show', $project->id)->with(['success' => 'Cashflow berhasil ditambahkan']);
        } catch (\Illuminate\Database\QueryException $e) {
            Log::error($e->getMessage());
            return redirect()->back()->withInput()->withErrors(['error' => 'Gagal menambahkan cashflow. Silakan coba lagi.']);
        }
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
        $cashflow->update($request->all());

        return redirect()->route('project.show', $project->id)->with(['success' => 'Cashflow berhasil diubah']);
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
