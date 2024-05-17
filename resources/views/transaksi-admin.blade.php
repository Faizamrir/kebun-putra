<style>
    [x-cloak] { display: none }
    </style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Transaksi') }}
        </h2>
    </x-slot>

    <div class="py-12" x-data="{ id: null, showApproveModal: false, showImageModal : false, images: null, showDetailModal: false, detailProducts: null, total: 0, openDetailModal: function(product) {
        this.showDetailModal = true;
        this.detailProducts = product;
        this.total = this.detailProducts.reduce((acc, curr) => acc + (curr.jumlah * curr.product.harga), 0);
        }, openImageModal: function(img) { 
            this.showImageModal = true;
            this.images = img;
        }, openApproveModal: function(id) {
            this.id = id;
            this.showApproveModal = true;
        } }" x-cloak>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        No
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Nama Pelanggan
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Tanggal Pembelian
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Tanggal konfirmasi Pembayaran
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Status Pembayaran
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Detail Pembelian
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Total
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Bukti Pembayaran
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pembelian as $item)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $loop->index + 1 }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $item->user->name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->tgl_pembelian }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->tgl_pembayaran ? $item->tgl_pembayaran : 'Belum dikonfirmasi' }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->status_pembayaran ? 'Lunas' : 'Belum lunas' }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <button x-on:click="openDetailModal(JSON.parse($event.target.getAttribute('data-detail')))" data-detail="{{ json_encode($item->detail_pembelian) }}" class="font-medium text-gray-600 dark:text-gray-500 hover:underline">View</button>
                                    </td>
                                    <td class="px-6 py-4">
                                        Rp.{{ number_format($item->total, 2) }}
                                    </td>
                                    <td class="px-6 py-4">
                                        @if ($item->bukti_pembayaran)
                                        <button x-on:click="openImageModal($event.target.getAttribute('data-images'))" data-images="{{ $item->bukti_pembayaran }}" class="font-medium text-gray-600 dark:text-gray-500 hover:underline">View</button>
                                        @else
                                        Belum ada
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        @if ($item->status_pembayaran == 0)
                                        <button x-on:click="openApproveModal($event.target.getAttribute('data-id'))" data-id="{{ $item->id }}" class="font-medium text-gray-600 dark:text-gray-500 hover:underline">Approve</button>
                                        @else
                                        Approved
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
        @include('modals.image-modal')
        @include('modals.detail-product-modal')
        @include('modals.approve-modal')
    </div>
</x-app-layout>
