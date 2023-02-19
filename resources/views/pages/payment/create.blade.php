<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bayar SPP') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <form method="post" action="{{ route('payment.store', $student) }}" class="mt-6 space-y-6">
                        @csrf

                        <input type="hidden" name="nisn" value="{{ $student->nisn }}">
                        <input type="hidden" name="school_fee_id" value="{{ $student->school_fee_id }}">
                        <div>
                            <x-input-label for="current_date" :value="__('Tanggal Pembayaran')"/>
                            <x-text-input id="current_date" name="current_date" type="text" class="mt-1 block w-full"
                                          :value="date('d/m/y')"
                                          disabled/>
                            <x-input-error class="mt-2" :messages="$errors->get('current_date')"/>
                        </div>

                        <div>
                            <x-input-label for="nisn" :value="__('NISN')"/>
                            <x-text-input id="nisn" name="nisn" type="text" class="mt-1 block w-full"
                                          :value="$student->nisn" disabled/>
                            <x-input-error class="mt-2" :messages="$errors->get('nisn')"/>
                        </div>

                        <div>
                            <x-input-label for="nama" :value="__('Nama')"/>
                            <x-text-input id="nama" name="nama" type="text" class="mt-1 block w-full"
                                          :value="$student->name" disabled/>
                            <x-input-error class="mt-2" :messages="$errors->get('nama')"/>
                        </div>

                        <div>
                            <x-input-label for="grade" :value="__('Kelas dan Kompetensi Keahlian')"/>
                            <x-text-input id="grade" name="grade" type="text" class="mt-1 block w-full"
                                          :value="$student->grade?->grade_name . ' - ' . $student->grade?->skill_competency"
                                          disabled/>
                            <x-input-error class="mt-2" :messages="$errors->get('grade')"/>
                        </div>

                        <div>
                            <x-input-label for="fee" :value="__('SPP')"/>
                            <x-text-input id="fee" name="fee" type="text" class="mt-1 block w-full"
                                          :value="$student->fee?->year . ' - Rp' . number_format($student->fee?->nominal,2,',','.')"
                                          disabled/>
                            <x-input-error class="mt-2" :messages="$errors->get('fee')"/>
                        </div>

                        <div>
                            <x-input-label for="paid_month" :value="__('Bulan Dibayar')"/>
                            <select id="paid_month" name="paid_month"
                                    class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                    autofocus>
                                @foreach($months as $month)
                                    <option value="{{ $month }}" @selected(old('paid_month') == $month)>
                                        {{ $month }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('paid_month')"/>
                        </div>

                        <div>
                            <x-input-label for="paid_year" :value="__('Tahun Dibayar')"/>
                            <x-text-input id="paid_year" name="paid_year" type="number" min="2010" max="{{ date('Y') }}"
                                          class="mt-1 block w-full" :value="old('paid_year', date('Y'))" required/>
                            <x-input-error class="mt-2" :messages="$errors->get('paid_year')"/>
                        </div>

                        <div>
                            <x-input-label for="amount" :value="__('Jumlah Bayar')"/>
                            <x-text-input id="amount" name="amount" type="number" min="0" class="mt-1 block w-full"
                                          :value="old('amount', $student->fee?->nominal)" required/>
                            <x-input-error class="mt-2" :messages="$errors->get('amount')"/>
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Simpan') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
