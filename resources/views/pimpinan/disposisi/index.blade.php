@extends('layout.main')

@section('title', 'Halaman Disposisi - Pimpinan')

@section('content')
    {{-- Message Alert --}}
    <div id="ajax-alert" class="alert" style="display:none"></div>
    @if (session()->has('message'))
        <div class="mx-[350px]">
            <div id="alert"
                class="fixed z-10 flex items-center w-full max-w-xs p-4 space-x-4 text-gray-500 bg-white divide-x divide-gray-200 rounded-lg shadow alert rtl:divide-x-reverse dark:text-gray-400 dark:divide-gray-700 space-x dark:bg-gray-800"
                role="alert">
                <div
                    class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                    </svg>
                    <span class="sr-only">Check icon</span>
                </div>
                <div class="text-sm font-semibold ps-4">{{ session()->get('message') }}</div>
            </div>
        </div>
    @endif
    <div class="flex flex-wrap mt-2 -mx-3">
        <div class="w-full max-w-full px-3 mt-0 mb-6 md:mb-0 md:w-1/2 md:flex-none lg:w-full lg:flex-none">
            <div
                class="border-black/12.5 shadow-soft-xl relative flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
                <div
                    class="relative flex flex-col w-full min-w-0 p-5 mb-0 overflow-x-auto break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="flex flex-col pb-4 mb-0 bg-white rounded-t-2xl">
                        <p class="text-lg font-bold text-black">Disposisi</p>
                        <a href="{{ route('pimpinan.disposisi.create') }}" type="button"
                            class="lg:w-[4%] w-[10%]  inline-block py-1 my-2 font-bold text-center uppercase align-middle transition-all bg-transparent border rounded-lg cursor-pointer border-indigo-800 hover:bg-indigo-800 leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85 hover:shadow-soft-xs text-indigo-800 hover:text-white">
                            <ion-icon name="add" class="w-6 h-6"></ion-icon>
                        </a>
                        <!-- Form Filter Tanggal -->
                        <form method="GET" target="_blank" action="{{ route('pimpinan.disposisi.laporan') }}"
                            id="filterForm" class="flex items-end gap-4">
                            <div class="flex flex-col w-full">
                                <label for="start_date" class="text-sm font-medium text-gray-900">Dari Tanggal:</label>
                                <input type="date" id="start_date" name="start_date" value="{{ request('start_date') }}"
                                    class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-600 focus:outline-none">
                            </div>

                            <div class="flex flex-col w-full">
                                <label for="end_date" class="text-sm font-medium text-gray-900">Sampai Tanggal:</label>
                                <input type="date" id="end_date" name="end_date" value="{{ request('end_date') }}"
                                    class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-600 focus:outline-none">
                            </div>

                            <!-- Tombol Filter -->
                            <button type="submit"
                                class="px-4 py-2 font-bold text-white bg-indigo-800 rounded-lg shadow-md hover:bg-indigo-900 focus:outline-none">
                                <ion-icon name="search" class="w-6 h-6"></ion-icon>
                            </button>
                        </form>
                    </div>

                    <div class="flex-auto pb-2">
                        <div class="overflow-x-auto">
                            <table class="min-w-full mb-0 align-top border border-collapse border-gray-300 text-slate-500">
                                <thead class="align-bottom">
                                    <tr class="bg-gray-200">
                                        <th class="px-1 py-3 text-center border border-slate-300">
                                            No
                                        </th>
                                        <th class="px-3 py-3 border text-start border-slate-300">
                                            Nomor Surat
                                        </th>
                                        <th class="px-3 py-3 text-center border border-slate-300">
                                            Perihal
                                        </th>
                                        <th class="px-3 py-3 text-center border border-slate-300">
                                            Tujuan
                                        </th>
                                        <th class="px-3 py-3 text-center border border-slate-300">
                                            Batas Waktu
                                        </th>
                                        <th class="px-3 py-3 text-center border border-slate-300">
                                            Status
                                        </th>
                                        <th class="px-3 py-3 border border-slate-300">
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($disposisis as $disposisi)
                                        <tr class="hover:bg-gray-100">
                                            <td class="px-2 py-3 text-center border border-slate-300">
                                                <p>
                                                    {{ ($disposisis->currentPage() - 1) * $disposisis->links()->paginator->perPage() + $loop->iteration }}
                                                </p>
                                            </td>
                                            <td class="px-3 py-3 border border-slate-300">
                                                <p class="mb-0 text-base font-semibold leading-tight">
                                                    {{ $disposisi->no_surat }}
                                                </p>
                                            </td>
                                            <td class="px-2 py-3 border border-slate-300">
                                                <p class="mb-0 text-base font-semibold leading-tight">
                                                    {{ $disposisi->perihal }}
                                                </p>
                                            </td>
                                            <td class="px-2 py-3 border border-slate-300">
                                                <p class="mb-0 text-base font-semibold leading-tight">
                                                    {{ $disposisi->pegawai }} - {{ $disposisi->position }}
                                                </p>
                                            </td>
                                            <td class="px-2 py-3 text-center border border-slate-300">
                                                <p class="mb-0 text-base font-semibold leading-tight">
                                                    {{ Carbon\Carbon::parse($disposisi->deadline)->isoFormat('D MMMM Y') }}
                                                </p>
                                            </td>
                                            <td class="px-2 py-3 text-center border border-slate-300">
                                                @if ($disposisi->status == 1)
                                                    <span
                                                        class="inline-flex items-center px-2 py-1 text-xs font-medium text-gray-600 rounded-md bg-gray-50 ring-1 ring-inset ring-gray-500/10">
                                                        Belum Diterima
                                                    </span>
                                                @else
                                                    <span
                                                        class="inline-flex items-center px-2 py-1 text-xs font-medium text-green-700 rounded-md bg-green-50 ring-1 ring-inset ring-green-600/20">
                                                        Diterima
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="px-1 py-3 text-center border border-slate-300">
                                                <a href="{{ route('pimpinan.disposisi.show', $disposisi->id) }}"
                                                    type="button"
                                                    class="inline-block px-3 py-1 mt-2 mr-3 text-xs font-bold text-center text-green-600 uppercase align-middle transition-all bg-transparent border border-green-600 rounded-lg cursor-pointer hover:bg-green-600 leading-pro ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85 hover:shadow-soft-xs hover:text-white"><ion-icon
                                                        name="eye" class="w-6 h-6"></ion-icon>
                                                </a>
                                                <a href="{{ route('pimpinan.disposisi.edit', $disposisi->id) }}"
                                                    type="button"
                                                    class="inline-block px-3 py-1 mt-2 mr-3 text-xs font-bold text-center text-yellow-300 uppercase align-middle transition-all bg-transparent border border-yellow-300 rounded-lg cursor-pointer hover:bg-yellow-300 leading-pro ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85 hover:shadow-soft-xs hover:text-white"><ion-icon
                                                        name="create" class="w-6 h-6"></ion-icon>
                                                </a>
                                                <a href="#" type="button" id="{{ $disposisi->id }}"
                                                    noSurat="{{ $disposisi->no_surat }}"
                                                    class="inline-block px-3 py-1 mt-2 mr-3 text-xs font-bold text-center text-red-600 uppercase align-middle transition-all bg-transparent border border-red-600 rounded-lg cursor-pointer HapusDisposisi hover:bg-red-600 leading-pro ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85 hover:shadow-soft-xs hover:text-white">
                                                    <ion-icon name="trash" class="w-6 h-6"></ion-icon>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="mt-3">
                                {{ $disposisis->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        //Aler Check
        if ($("#alert").length) {
            setTimeout(() => {
                $('#alert').hide()
            }, 3000)
        }

        //Delete
        $(document).on('click', '.HapusDisposisi', function(e) {
            e.preventDefault()

            const id = $(this).attr('id')
            const noSurat = $(this).attr('noSurat')

            Swal.fire({
                    title: "Yakin ?",
                    text: `Disosisi akan dihapus ?`,
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, Hapus.",
                    cancelButtonText: "Batal."
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: `{{ url('pimpinan/disposisi/${id}') }}`,
                            type: "POST",
                            data: {
                                '_method': 'DELETE',
                                'id': id,
                            },
                            success: function(response) {
                                if (response.status == 200) {
                                    $('#ajax-alert').addClass(
                                        'alert fixed flex items-center w-full max-w-xs p-4 space-x-4 text-gray-500 bg-white divide-x rtl:divide-x-reverse divide-gray-200 rounded-lg shadow  dark:text-gray-400 dark:divide-gray-700 space-x dark:bg-gray-800 z-10 mx-[350px]'
                                    ).show(function() {
                                        $(this).html(
                                            ` <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                                    </svg>
                                        <span class="sr-only">Check icon</span>
                                    </div>
                                    <div class="text-sm font-semibold ps-4">${response.message}</div>`
                                        )
                                    })
                                    setTimeout(() => {
                                        $('#ajax-alert').hide()
                                    }, 2000)
                                }
                                setTimeout(() => {
                                    location.reload()
                                }, 2000)
                            }
                        })
                    }
                })
        })
    </script>
@endsection
