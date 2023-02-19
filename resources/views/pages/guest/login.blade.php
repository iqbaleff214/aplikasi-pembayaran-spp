<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')"/>

    <form method="POST" action="{{ route('guest.auth') }}">
        @csrf

        <!-- NISN -->
        <div>
            <x-input-label for="nisn" :value="__('NISN')"/>
            <x-text-input id="nisn" class="block mt-1 w-full" type="text" name="nisn" :value="old('nisn')" required
                          autofocus autocomplete="nisn"/>
            <x-input-error :messages="$errors->get('nisn')" class="mt-2"/>
        </div>

        <!-- NIS -->
        <div class="mt-4">
            <x-input-label for="nis" :value="__('NIS')"/>
            <x-text-input id="nis" class="block mt-1 w-full" type="text" name="nis" :value="old('nis')" required
                          autofocus autocomplete="nis"/>
            <x-input-error :messages="$errors->get('nis')" class="mt-2"/>
        </div>

        <div class="flex items-center justify-end mt-4">

            <a href="{{ route('login') }}"
               class="inline-flex items-center ml-3 px-6 py-2 bg-gray-800 border border-transparent text-xs rounded-md font-semibold text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 transition ease-in-out duration-150">
                {{ __('Petugas') }}
            </a>
            <x-primary-button class="ml-3">
                {{ __('Masuk') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
