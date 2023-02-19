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
                    <form method="post" action="{{ route('grade.store') }}" class="mt-6 space-y-6">
                        @csrf

                        <div>
                            <x-input-label for="grade_name" :value="__('Nama Kelas')" />
                            <x-text-input id="grade_name" name="grade_name" type="text" class="mt-1 block w-full" :value="old('name')" autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('grade_name')" />
                        </div>

                        <div>
                            <x-input-label for="skill_competency" :value="__('Kompetensi Keahlian')" />
                            <x-text-input id="skill_competency" name="skill_competency" type="text" class="mt-1 block w-full" :value="old('skill_competency')" />
                            <x-input-error class="mt-2" :messages="$errors->get('skill_competency')" />
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
