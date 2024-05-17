<div id="default-modal" x-show="showDetailModal" tabindex="-1" aria-hidden="true" class="flex overflow-y-auto overflow-x-hidden inset-0 fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-full">
    <div class="relative p-4 w-full max-w-2xl">
        <!-- Modal content -->
        <div @click="showDetailModal = false" class="fixed inset-0 bg-black opacity-50"></div>
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Detail Pembelian
                </h3>
                <button type="button" @click="showDetailModal = false" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                

            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3 rounded-s-lg">
                                Nama Produk
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Jumlah
                            </th>
                            <th scope="col" class="px-6 py-3 rounded-e-lg">
                                Harga
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <template x-for="(product, index) in detailProducts" :key="index">
                            <tr class="bg-white dark:bg-gray-800">
                                <td x-text="product.product && product.product.nama ? product.product.nama : 'N/A'" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"></td>
                                <td x-text="product.jumlah ? product.jumlah : 'N/A'" class="px-6 py-4"></td>
                                <td x-text="(product.jumlah && product.product && product.product.harga) ? (product.jumlah * product.product.harga).toLocaleString('id-ID', { style: 'currency', currency: 'IDR' }) : 'N/A'" class="px-6 py-4"></td>
                            </tr>
                        </template>
                    </tbody>
                    <tfoot>
                        <tr class="font-semibold text-gray-900 dark:text-white">
                            <th scope="row" class="px-6 py-3 text-base">Total</th>
                            <td rowspan="2" class="px-6 py-3"></td>
                            <td class="px-6 py-3" x-text="total ? total.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' }) : ''"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
            </div>
        </div>
    </div>
</div>
