@props(['nama', 'kategori', 'harga', 'gambar'])

<a href="#" class="group block">
    <div class="aspect-square overflow-hidden bg-neutral-100">
        <img src="{{ asset('images/produk/'.$gambar.'.svg') }}" alt="{{ $nama }}"
             class="h-full w-full object-cover" loading="lazy">
    </div>

    <p class="mt-4 text-sm text-neutral-900 group-hover:underline">{{ $nama }}</p>
    <p class="mt-1 text-xs text-neutral-500">{{ $kategori }}</p>
    <p class="mt-2 text-sm text-neutral-900">Rp{{ number_format($harga, 0, ',', '.') }}</p>
</a>
