<style>
    [x-cloak] { display: none }
    </style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12" x-data="{ showModal: false, editMode: false,  editItem: {}, openModal: function(mode, product = null) {
        this.editMode = mode === 'edit';
        if (mode === 'edit') {
            // Populate editItem with user data if editing
            this.editItem.id = product.id;
            this.editItem.nama = product.nama;
            this.editItem.harga = product.harga;
            this.editItem.deskripsi = product.deskripsi;
            this.editItem.img = product.img;
        } else {
            // Clear editItem if adding
            this.editItem.id = null;
            this.editItem.nama = '';
            this.editItem.harga = 0;
            this.editItem.deskripsi = '';
        }
        this.showModal = true;
    },
    closeModal: function() {
        this.showModal = false;
    } }" x-cloak>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <button @click="openModal('add')" id="tambah-produk" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Tambah</button>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        No
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Gambar
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Nama Produk
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Harga
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Deskripsi
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $loop->index + 1 }}
                                    </th>
                                    <td class="px-6 py-4">
                                        <img src="{{ asset('storage/images/'.$product->img) }}" alt="Laravel" class="h-20 w-20 flex-shrink-0">
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $product->nama }}
                                    </td>
                                    <td class="px-6 py-4">
                                        Rp. {{ number_format($product->harga, 2) }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $product->deskripsi }}
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <a href="#" @click="openModal('edit', editItem = { id: {{ $product->id }}, img: '{{ $product->img }}', nama: '{{ $product->nama }}', harga: {{ $product->harga }}, deskripsi: '{{ $product->deskripsi }}' });" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                        <form action="{{ route('product-delete', $product->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @include('modals.product-modal')
    </div>

</x-app-layout>

