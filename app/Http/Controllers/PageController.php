<?php

namespace App\Http\Controllers;

use App\Models\Student;
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
}
