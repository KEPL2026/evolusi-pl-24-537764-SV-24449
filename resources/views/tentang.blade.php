@extends('layouts.app')

@section('judul', 'Tentang')

@section('konten')
    <section class="border-b border-neutral-200">
        <div class="mx-auto max-w-6xl px-6 py-20">
            <h1 class="max-w-xl text-3xl font-medium tracking-tight sm:text-4xl">
                Tentang Ruang Rumah
            </h1>
            <p class="mt-4 max-w-lg text-sm text-neutral-600">
                Ruang Rumah berdiri pada 2021 dari satu bengkel kecil di Yogyakarta.
                Kami menjual perabot rumah yang sederhana, tahan lama, dan dikerjakan
                langsung oleh perajin lokal.
            </p>
        </div>
    </section>

    <section class="mx-auto max-w-6xl px-6 py-16">
        <h2 class="text-lg font-medium tracking-tight">Yang kami pegang</h2>

        <div class="mt-10 grid gap-8 sm:grid-cols-3">
            @foreach ($nilai as $item)
                <div>
                    <h3 class="text-sm font-medium">{{ $item['judul'] }}</h3>
                    <p class="mt-2 text-sm text-neutral-600">{{ $item['isi'] }}</p>
                </div>
            @endforeach
        </div>
    </section>

    <section class="border-t border-neutral-200">
        <div class="mx-auto max-w-6xl px-6 py-12">
            <h2 class="text-sm font-medium">Hubungi kami</h2>
            <p class="mt-2 max-w-md text-sm text-neutral-600">
                Bengkel dan ruang pamer kami buka Senin sampai Jumat, pukul 09.00-17.00 WIB.
                Kirim pertanyaan ke <span class="text-neutral-900">halo@ruangrumah.test</span>.
            </p>

            <a href="{{ route('beranda') }}#produk"
               class="mt-8 inline-block bg-neutral-900 px-5 py-2.5 text-sm text-white hover:bg-neutral-700">
                Lihat produk kami
            </a>
        </div>
    </section>
@endsection
