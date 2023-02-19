<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Grade;
use App\Models\SchoolFee;
use App\Models\Student;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        return view('pages.student.index', [
            'students' => Student::render($request->search),
            'search' => $request->search,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('pages.student.create', [
            'grades' => Grade::all(),
            'fees' => SchoolFee::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request): RedirectResponse
    {
        try {
            Student::create($request->validated());
            return redirect()->route('student.index')->with('status', 'success')->with('message', 'Berhasil.');
        } catch (\Throwable $exception) {
            return redirect()->route('student.index')->with('status', 'failed')->with('message', $exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student): View
    {
        return view('pages.student.show', [
            'student' => $student
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student): View
    {
        return view('pages.student.edit', [
            'student' => $student,
            'grades' => Grade::all(),
            'fees' => SchoolFee::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student): RedirectResponse
    {
        try {
            $student->update($request->validated());
            return back()->with('status', 'success')->with('message', 'Berhasil.');
        } catch (\Throwable $exception) {
            return back()->with('status', 'failed')->with('message', $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student): RedirectResponse
    {
        try {
            $student->delete();
            return back()->with('status', 'success')->with('message', 'Berhasil.');
        } catch (\Throwable $exception) {
            return back()->with('status', 'failed')->with('message', $exception->getMessage());
        }
    }
}
