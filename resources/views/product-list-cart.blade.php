@foreach ($products as $item)
        {{-- sini --}}
    <div class="relative block overflow-hidden group">

    <img
        src="{{ asset('storage/images/'.$item->img) }}"
        alt=""
        class="object-cover w-full h-64 transition duration-500 group-hover:scale-105 sm:h-72"
    />
    <form  method="post" action="{{ route('addCart') }}">
        @csrf
    <div class="relative p-6 bg-white border border-gray-100">
        <h3 class="mt-4 text-lg font-medium text-gray-900">{{ $item->nama }}</h3>
        <p class="mt-1.5 text-md text-gray-950">Rp. {{ number_format($item->harga, 2) }}</p>
        <h3 class="mt-4 text-sm text-gray-900">{{ $item->deskripsi}}</h3>
        <!-- gunakan form ini untuk memasukkan data kedalam keranjang -->
        <input type="hidden" name="no_produk" value="{{ $item->id }}">
        <button {{ collect($keranjangs)->contains('no_produk', $item->id) ? 'disabled' : '' }} type="submit"class="block w-full p-4 mt-4 text-sm font-medium transition bg-yellow-400 rounded hover:scale-105">
        {{ collect($keranjangs)->contains('no_produk', $item->id) ? 'Item already in cart' : 'Add to cart' }}
        </button>
    </form>
    <!-- form sampai sini -->
    </div>
    </div>

@endforeach