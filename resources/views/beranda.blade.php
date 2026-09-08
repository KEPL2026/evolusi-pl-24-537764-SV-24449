@extends('layouts.app')

@section('judul', 'Beranda')

@section('konten')
    <section class="border-b border-neutral-200">
        <div class="mx-auto max-w-6xl px-6 py-20">
            <h1 class="max-w-xl text-3xl font-medium tracking-tight sm:text-4xl">
                Perabot rumah yang sederhana dan tahan lama.
            </h1>
            <p class="mt-4 max-w-md text-sm text-neutral-600">
                Dibuat dari bahan pilihan, dikirim langsung dari perajin lokal.
                Gratis ongkir untuk pembelian di atas Rp500.000.
            </p>
            <div class="mt-8 flex items-center gap-6">
                <a href="#produk" class="bg-neutral-900 px-5 py-2.5 text-sm text-white hover:bg-neutral-700">
                    Belanja sekarang
                </a>
                <a href="#layanan" class="text-sm text-neutral-600 hover:text-neutral-900">
                    Lihat layanan kami
                </a>
            </div>
        </div>
    </section>

    <section id="produk" class="mx-auto max-w-6xl px-6 py-16">
        <div class="flex items-baseline justify-between">
            <h2 class="text-lg font-medium tracking-tight">Produk terbaru</h2>
            <a href="#" class="text-sm text-neutral-600 hover:text-neutral-900">Lihat semua</a>
        </div>

        <nav class="mt-6 flex gap-6 overflow-x-auto border-b border-neutral-200 pb-3 text-sm">
            @foreach ($kategori as $item)
                <a href="#produk"
                   @class([
                       'whitespace-nowrap',
                       'text-neutral-900' => $loop->first,
                       'text-neutral-500 hover:text-neutral-900' => ! $loop->first,
                   ])>
                    {{ $item }}
                </a>
            @endforeach
        </nav>

        <div class="mt-10 grid grid-cols-2 gap-x-6 gap-y-10 md:grid-cols-4">
            @foreach ($produk as $item)
                <x-kartu-produk
                    :nama="$item['nama']"
                    :kategori="$item['kategori']"
                    :harga="$item['harga']"
                    :gambar="$item['gambar']" />
            @endforeach
        </div>
    </section>

    <section id="layanan" class="border-t border-neutral-200">
        <div class="mx-auto grid max-w-6xl gap-8 px-6 py-12 sm:grid-cols-3">
            <div>
                <h3 class="text-sm font-medium">Pengiriman gratis</h3>
                <p class="mt-2 text-sm text-neutral-600">Untuk pembelian di atas Rp500.000 ke seluruh Indonesia.</p>
            </div>
            <div>
                <h3 class="text-sm font-medium">Garansi satu tahun</h3>
                <p class="mt-2 text-sm text-neutral-600">Perbaikan atau penggantian untuk cacat produksi.</p>
            </div>
            <div>
                <h3 class="text-sm font-medium">Pengembalian 14 hari</h3>
                <p class="mt-2 text-sm text-neutral-600">Barang belum dipakai dan kemasan masih lengkap.</p>
            </div>
        </div>
    </section>
@endsection
