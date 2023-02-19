<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Siswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="flex flex-row mt-6 mb-4">
                                <div class="w-full">
                                    <form method="GET" action="">
                                        <x-text-input
                                            id="search"
                                            class="block w-full"
                                            type="text"
                                            placeholder="[Tekan Enter untuk mencari]"
                                            name="search"
                                            :value="old('search', $search)"
                                            autocomplete="off"
                                        />
                                    </form>
                                </div>
                                <div class="ml-3">
                                    <a href="{{ route('student.create') }}"
                                       class="inline-flex items-center px-6 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 transition ease-in-out duration-150">
                                        Tambah
                                    </a>
                                </div>
                            </div>

                            <div class="overflow-hidden mb-6">
                                <table class="min-w-full w-full">
                                    <thead class="border-b">
                                    <tr>
                                        <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4 text-left">
                                            NISN | NIS
                                        </th>
                                        <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4 text-left">
                                            Nama
                                        </th>
                                        <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4 text-left">
                                            Alamat
                                        </th>
                                        <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4 text-left">
                                            Nomor Telepon
                                        </th>
                                        <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4 text-left">
                                            Aksi
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($students as $student)
                                        <tr class="border-b">
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ $student->nisn . ' | ' . $student->nis }}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ $student->name }}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ $student->address ?? '-' }}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ $student->phone ?? '-' }}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <form action="{{ route('student.destroy', $student->nisn) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="flex">
                                                        <a href="{{ route('student.edit', $student->nisn) }}"
                                                           class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 transition ease-in-out duration-150">
                                                            Edit
                                                        </a>
                                                        <button type="submit"
                                                                class="inline-flex ml-2 items-center px-4 py-2 bg-red-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-900 transition ease-in-out duration-150">
                                                            Hapus
                                                        </button>
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                            {!! $students->links() !!}

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
</x-app-layout>
