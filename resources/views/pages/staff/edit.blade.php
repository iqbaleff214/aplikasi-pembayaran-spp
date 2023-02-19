<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <form method="post" action="{{ route('staff.update', $staff) }}" class="mt-6 space-y-6">
                        @csrf
                        @method('patch')
                        <input type="hidden" name="id" value="{{ $staff->id }}">

                        <div>
                            <x-input-label for="name" :value="__('Nama')"/>
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                                          :value="old('name', $staff->name)" autofocus/>
                            <x-input-error class="mt-2" :messages="$errors->get('name')"/>
                        </div>

                        <div>
                            <x-input-label for="username" :value="__('Username')"/>
                            <x-text-input id="username" name="username" type="text" class="mt-1 block w-full"
                                          :value="old('username', $staff->username)"/>
                            <x-input-error class="mt-2" :messages="$errors->get('username')"/>
                        </div>

                        <p
                            class="text-sm text-gray-600 mb-4"
                        >{{ __('Anda tidak dapat mengganti password dari akun petugas.') }}</p>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Simpan') }}</x-primary-button>

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
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
