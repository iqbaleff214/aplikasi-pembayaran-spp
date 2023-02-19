<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Student;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PageController extends Controller
{
    public function index(Request $request): View
    {
        return view('dashboard', [
            'students' => Student::render($request->search),
            'search' => $request->search,
        ]);
    }

    public function login(Request $request): View|RedirectResponse
    {
        $student = $request->session()->get('student');
        if ($student) {
            return redirect()->route('guest.history', $student->nisn);
        }
        return view('pages.guest.login');
    }

    public function logout(Request $request): RedirectResponse
    {
        $request->session()->forget('student');
        return redirect()->route('login');
    }

    public function authentication(Request $request): RedirectResponse
    {
        try {
            $student = Student::where('nisn', $request->get('nisn'))
                ->where('nis', $request->get('nis'))
                ->first();
            if (!$student) {
                throw new \Exception('Data tidak cocok!');
            }

            $request->session()->put('student', $student);
            return redirect()->route('guest.history', $student->nisn);
        } catch (\Throwable $exception) {
            return back()->with('status', $exception->getMessage())->with('message', $exception->getMessage());
        }
    }

    public function history(Request $request): RedirectResponse|View
    {
        $student = $request->session()->get('student');
        if (!$student) {
            return redirect()->route('guest.login');
        }
        return view('pages.guest.history', [
            'payments' => Payment::render($request->search, $student->nisn),
            'student' => $student,
        ]);
    }
}
