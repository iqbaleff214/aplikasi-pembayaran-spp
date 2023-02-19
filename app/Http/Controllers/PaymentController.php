<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Student;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, Student $student): View
    {
        return view('pages.payment.index', [
            'payments' => Payment::render($request->search, $student->nisn),
            'student' => $student,
            'search' => $request->search,
        ]);
    }

    public function print(Request $request, Student $student): Response
    {
        $pdf = Pdf::loadView('pages.payment.print', [
            'title' => 'Laporan Pembayaran SPP',
            'student' => $student,
            'payments' => Payment::where('nisn', $student->nisn)->get(),
        ]);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->download('laporan_spp_' . $student->nisn . '.pdf');
    }

    public function create(Student $student): View
    {
        $student->load(['grade', 'fee']);
        return \view('pages.payment.create', [
            'student' => $student,
            'months' => [
                'Januari', 'Februari', 'Maret', 'April',
                'Mei', 'Juni', 'Juli', 'Agustus',
                'September', 'Oktober', 'November', 'Desember',
            ],
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->all();
        try {
            $exists = Payment::where('nisn', $data['nisn'])
                ->where('paid_year', $data['paid_year'])
                ->where('paid_month', $data['paid_month'])->count();
            if ($exists) {
                throw new \Exception('Sudah lunas.');
            }
            $data['user_id'] = auth()->user()->id;
            $data['paid_at'] = now();
            Payment::create($data);
            return redirect()->route('payment.index', $data['nisn'])->with('status', 'success')->with('message', 'Berhasil.');
        } catch (\Throwable $exception) {
            return redirect()->route('payment.index', $data['nisn'])->with('status', 'failed')->with('message', $exception->getMessage());
        }
    }
}
