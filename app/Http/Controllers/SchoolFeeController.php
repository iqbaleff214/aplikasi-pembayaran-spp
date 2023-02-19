<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSchoolFeeRequest;
use App\Http\Requests\UpdateSchoolFeeRequest;
use App\Models\SchoolFee;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class SchoolFeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        return view('pages.fee.index', [
            'fees' => SchoolFee::render($request->search),
            'search' => $request->search,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('pages.fee.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSchoolFeeRequest $request): RedirectResponse
    {
        try {
            SchoolFee::create($request->validated());
            return redirect()->route('fee.index')->with('status', 'success')->with('message', 'Berhasil.');
        } catch (\Throwable $exception) {
            return redirect()->route('fee.index')->with('status', 'failed')->with('message', $exception->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SchoolFee $fee): View
    {
        return view('pages.fee.edit', [
            'fee' => $fee,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSchoolFeeRequest $request, SchoolFee $fee): RedirectResponse
    {
        try {
            $fee->update($request->validated());
            return back()->with('status', 'success')->with('message', 'Berhasil.');
        } catch (\Throwable $exception) {
            return back()->with('status', 'failed')->with('message', $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SchoolFee $fee): RedirectResponse
    {
        try {
            $fee->delete();
            return back()->with('status', 'success')->with('message', 'Berhasil.');
        } catch (\Throwable $exception) {
            return back()->with('status', 'failed')->with('message', $exception->getMessage());
        }
    }
}
