@extends('layouts.app')

@section('judul', 'Akun')

@section('konten')
    <section class="mx-auto max-w-2xl px-6 py-20">
        @if (session('status'))
            <p class="mb-8 border-l-2 border-neutral-900 pl-4 text-sm text-neutral-600">
                {{ session('status') }}
            </p>
        @endif

        <h1 class="text-xl font-medium tracking-tight">Halo, {{ $pengguna->name }}</h1>
        <p class="mt-2 text-sm text-neutral-600">Ini ringkasan akun kamu.</p>

        <dl class="mt-8 divide-y divide-neutral-200 border-y border-neutral-200 text-sm">
            <div class="flex justify-between py-3">
                <dt class="text-neutral-500">Nama</dt>
                <dd>{{ $pengguna->name }}</dd>
            </div>
            <div class="flex justify-between py-3">
                <dt class="text-neutral-500">Email</dt>
                <dd>{{ $pengguna->email }}</dd>
            </div>
            <div class="flex justify-between py-3">
                <dt class="text-neutral-500">Bergabung</dt>
                <dd>{{ $pengguna->created_at->translatedFormat('d F Y') }}</dd>
            </div>
        </dl>

        <h2 class="mt-12 text-sm font-medium">Pesanan</h2>
        <p class="mt-2 text-sm text-neutral-600">Belum ada pesanan. Mulai dari
            <a href="{{ route('beranda') }}#produk" class="text-neutral-900 underline">daftar produk</a>.
        </p>

        <form method="POST" action="{{ route('logout') }}" class="mt-12">
            @csrf
            <button type="submit" class="border border-neutral-300 px-5 py-2.5 text-sm hover:border-neutral-900">
                Keluar dari akun
            </button>
        </form>
    </section>
@endsection
