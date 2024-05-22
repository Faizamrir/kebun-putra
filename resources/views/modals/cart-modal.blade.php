<!-- Main modal -->
<div id="static-modal" x-show="openCart" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-neutral-800">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Keranjang Anda
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="static-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <!-- tampilkan data keranjang dari database disini -->
            <section>
            <div x-data="cart()" class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 sm:py-12 lg:px-8">
                <div class="mx-auto max-w-3xl">

                <div class="mt-8">
                    <ul class="space-y-4">
                    {{-- start cart --}}
                    @foreach ($keranjangs as $item)
                        
                    <li id="item_{{ $item->id }}" x-data="{ quantity: {{ $item->jumlah }} }" class="flex items-center gap-4">
                        <img
                        src="{{ asset('storage/images/'.$item->product->img) }}"
                        alt=""
                        class="size-16 rounded object-cover"
                        />

                        <div>
                        <h3 class="text-sm text-gray-900 dark:text-white">{{ $item->product->nama }}</h3>

                        <dl class="mt-0.5 space-y-px text-[16px] text-gray-600 dark:text-white">
                            <div>
                            <dt class="inline">Harga:</dt>
                            <dd class="inline">{{ $item->product->harga }}</dd>
                            </div>

                            <div>
                            <dt class="inline">Deskripsi:</dt>
                            <dd class="inline">{{ $item->product->deskripsi }}</dd>
                            </div>
                        </dl>
                        </div>

                        <div class="flex flex-1 items-center justify-end gap-2">
                        <form id="update-cart-form" data-product-id="{{ $item->id }}" method="POST" >
                            @csrf
                            <label for="Line1Qty_{{ $item->id }}" class="sr-only"> Quantity </label>
                            <input
                            x-model="quantity"
                            @input="updateQTY({{ $item->id }}, quantity)"
                            type="number"
                            min="1"
                            value="{{ $item->jumlah }}"
                            id="Line1Qty_{{ $item->id }}"
                            onchange="updateCart({{ $item->id }}, this.value)"
                            name="jumlah"
                            class="h-8 w-12 rounded border-gray-200 bg-gray-50 p-0 text-center text-xs text-gray-600 [-moz-appearance:_textfield] focus:outline-none [&::-webkit-inner-spin-button]:m-0 [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:m-0 [&::-webkit-outer-spin-button]:appearance-none"
                            />
                        </form>

                        <button class="text-gray-600 transition hover:text-red-600" @click="removeItem({{ $item->id }})" >
                            <span class="sr-only">Remove item</span>

                            <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="h-4 w-4"
                            
                            >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
                            />
                            </svg>
                        </button>
                        </div>
                    </li>
                    @endforeach
                    {{-- end Cart --}}
                    </ul>

                    <div class="mt-8 flex justify-end border-t border-gray-100 pt-8 dark:text-white">
                    <div class="w-screen max-w-lg space-y-4">
                        <dl class="space-y-0.5 text-sm text-gray-700">
                        <div class="flex justify-between dark:text-white">
                            <dt>Subtotal</dt>
                            <dd x-text="subtotal">£250</dd>
                        </div>

                        <div class="flex justify-between dark:text-white">
                            <dt>VAT</dt>
                            <dd x-text="vat">£25</dd>
                        </div>

                        <div class="flex justify-between dark:text-white">
                            <dt>Discount</dt>
                            <dd x-text="discount">-£20</dd>
                        </div>

                        <div class="flex justify-between !text-base font-medium dark:text-white">
                            <dt>Total</dt>
                            <dd x-text="total">£200</dd>
                        </div>
                        </dl>

                        <div class="flex justify-end">
                        <span
                            class="inline-flex items-center justify-center rounded-full bg-indigo-100 px-2.5 py-0.5 text-indigo-700"
                        >
                            <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="-ms-1 me-1.5 h-4 w-4"
                            >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 010 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 010-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375z"
                            />
                            </svg>

                            <p class="whitespace-nowrap text-xs">2 Discounts Applied</p>
                        </span>
                        </div>
                        <!-- sampai sini batas data keranjang -->

                        <div class="flex justify-end">
                        <a
                            x-show="total > 0"
                            @click="checkout()"
                            href="#"
                            class="block rounded bg-gray-700 px-5 py-3 text-sm text-gray-100 transition hover:bg-gray-600"
                        >
                            Checkout
                        </a>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </section>
        <!-- end of main modal -->