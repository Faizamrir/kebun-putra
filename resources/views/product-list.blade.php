@foreach ($products as $item)
    <div>
        <a href="" class="relative block overflow-hidden group">
            <img src="{{ asset('storage/images/'.$item->img) }}" alt="" class="object-cover w-full h-64 transition duration-500 group-hover:scale-105 sm:h-72"/>
            <div class="relative p-6 bg-white border border-gray-100">
                <h3 class="mt-4 text-lg font-medium text-gray-900">{{ $item->nama }}</h3>
                <p class="mt-1.5 text-md text-gray-950">Rp. {{ number_format($item->harga, 0) }}</p>
                <h3 class="mt-4 text-sm text-gray-900">{{ $item->deskripsi}}</h3>
            </div>
        </a>
    </div>
@endforeach