<x-app-layout>
<div class="container grid gap-4 max-w-4xl mx-auto my-4">
                <div class="mx-auto max-w-3xl">
                    

                <div class="mt-8">
                    <ul class="space-y-4">
                    <li class="flex items-center gap-4">
                        <img
                        src="https://images.unsplash.com/photo-1618354691373-d851c5c3a990?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=830&q=80"
                        alt=""
                        class="size-16 rounded object-cover"
                        />

                        <div>
                        <h3 class="text-sm text-gray-900 dark:text-white">Basic Tee 6-Pack</h3>

                        <dl class="mt-0.5 space-y-px text-[16px] text-gray-600 dark:text-white">
                            <div>
                            <dt class="inline">Size:</dt>
                            <dd class="inline">XXS</dd>
                            </div>

                            <div>
                            <dt class="inline">Color:</dt>
                            <dd class="inline">White</dd>
                            </div>
                        </dl>
                        </div>

                        <div class="flex flex-1 items-center justify-end gap-2">
                        <form>
                            <label for="Line1Qty" class="sr-only"> Quantity </label>

                            <input
                            type="number"
                            min="1"
                            value="1"
                            id="Line1Qty"
                            disabled
                            class="h-8 w-12 rounded border-gray-200 bg-gray-50 p-0 text-center text-xs text-gray-600 [-moz-appearance:_textfield] focus:outline-none [&::-webkit-inner-spin-button]:m-0 [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:m-0 [&::-webkit-outer-spin-button]:appearance-none"
                            >
                        </form>
                        </div>
                    </li>
                    </ul>

                    <div class="mt-8 flex justify-end border-t border-gray-100 pt-8 dark:text-white">
                    <div class="w-screen max-w-lg space-y-4">
                        <dl class="space-y-0.5 text-sm text-gray-700">
                        <div class="flex justify-between dark:text-white">
                            <dt>Subtotal</dt>
                            <dd>£250</dd>
                        </div>

                        <div class="flex justify-between dark:text-white">
                            <dt>VAT</dt>
                            <dd>£25</dd>
                        </div>

                        <div class="flex justify-between dark:text-white">
                            <dt>Discount</dt>
                            <dd>-£20</dd>
                        </div>

                        <div class="flex justify-between !text-base font-medium dark:text-white">
                            <dt>Total</dt>
                            <dd>£200</dd>
                        </div>
                        </dl>
                        <hr>

                        <!-- sampai sini batas data keranjang -->
                        <form action="{{ route('payment') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div>
                            <h2 class=" mt-4 mb-2 font-bold text-center dark:text-white">Upload Bukti Pembayaran</h2>
                                </div>
                                <input type="hidden" name="id" value="{{ request('id') }}" />
                                <input name="bukti" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" type="file" required>
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>
                        <button type="submit" class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Kirim</button>
                        <a href=""><button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Kembali</button></a></div>
                        </form>
                    </div>
                    
                    </div>
                </div>
            </div>
</div>


</x-app-layout>