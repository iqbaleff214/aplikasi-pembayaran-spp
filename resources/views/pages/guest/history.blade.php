<x-student-layout>

    <div class="pt-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __('Pembayaran SPP ' . $student->name . ' [' . $student->nisn . ']') }}
                <form action="{{ route('guest.logout') }}" method="post">
                    @csrf
                    <x-primary-button class="mt-4 mx-auto">
                        {{ __('Keluar') }}
                    </x-primary-button>
                </form>
                </div>
            </div>
        </div>
    </div>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">

                            <div class="overflow-hidden mt-6 mb-6">
                                <table class="min-w-full w-full">
                                    <thead class="border-b">
                                    <tr>
                                        <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4 text-left">
                                            Tanggal Bayar
                                        </th>
                                        <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4 text-left">
                                            Dibayar
                                        </th>
                                        <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4 text-left">
                                            Jumlah Bayar
                                        </th>
                                        <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4 text-left">
                                            Petugas
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($payments as $payment)
                                        <tr class="border-b">
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ $payment->paid_at }}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ $payment->paid_month . ' ' . $payment->paid_year }}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ "Rp" . number_format($payment->amount,2,',','.') }}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ $payment->staff?->name }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                            {!! $payments->links() !!}

                            @if (in_array(session('status'), ['success', 'failed']))
                                <p
                                    x-data="{ show: true }"
                                    x-show="show"
                                    x-transition
                                    x-init="setTimeout(() => show = false, 2000)"
                                    class="text-sm text-gray-600 mb-4"
                                >{{ session('message') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-student-layout>
