@extends('layouts.pdf')

@section('header')
    <table style="width: 100%">
        <tr>
            <td style="width: 15%" class="font-weight-bold">Siswa:</td>
            <td style="width: 50%">{{ $student->name . ' - ' . $student->nisn }}</td>
            <td style="width: 15%" class="font-weight-bold">Tanggal Cetak:</td>
            <td style="width: 20%; text-align: right">{{ \Carbon\Carbon::now()->isoFormat('DD-MM-Y') }}</td>
        </tr>
    </table>
@endsection

@section('content')
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Tanggal Bayar</th>
            <th scope="col">Bulan Dibayar</th>
            <th scope="col">Tahun Dibayar</th>
            <th scope="col">Nominal</th>
            <th scope="col">Petugas Penerima</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($payments as $payment)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ \Carbon\Carbon::parse($payment->paid_at)->isoFormat('DD-MM-Y') }}</td>
                <td>{{ $payment->paid_month }}</td>
                <td>{{ $payment->paid_year }}</td>
                <td>{{ "Rp" . number_format($payment->amount,2,',','.') }}</td>
                <td>{{ $payment->staff?->name }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
