<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGradeRequest;
use App\Http\Requests\UpdateGradeRequest;
use App\Models\Grade;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        return view('pages.grade.index', [
            'grades' => Grade::render($request->search),
            'search' => $request->search,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('pages.grade.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGradeRequest $request): RedirectResponse
    {
        try {
            Grade::create($request->validated());
            return redirect()->route('grade.index')->with('status', 'success')->with('message', 'Berhasil.');
        } catch (\Throwable $exception) {
            return redirect()->route('grade.index')->with('status', 'failed')->with('message', $exception->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grade $grade): View
    {
        return view('pages.grade.edit', [
            'grade' => $grade,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGradeRequest $request, Grade $grade): RedirectResponse
    {
        try {
            $grade->update($request->validated());
            return back()->with('status', 'success')->with('message', 'Berhasil.');
        } catch (\Throwable $exception) {
            return back()->with('status', 'failed')->with('message', $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grade $grade): RedirectResponse
    {
        try {
            $grade->delete();
            return back()->with('status', 'success')->with('message', 'Berhasil.');
        } catch (\Throwable $exception) {
            return back()->with('status', 'failed')->with('message', $exception->getMessage());
        }
    }
}
