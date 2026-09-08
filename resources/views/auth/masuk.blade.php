@extends('layouts.app')

@section('judul', 'Masuk')

@section('konten')
    <section class="mx-auto max-w-sm px-6 py-20">
        <h1 class="text-xl font-medium tracking-tight">Masuk</h1>
        <p class="mt-2 text-sm text-neutral-600">
            Belum punya akun?
            <a href="{{ route('register') }}" class="text-neutral-900 underline">Daftar dulu</a>.
        </p>

        <form method="POST" action="{{ route('login') }}" class="mt-8 space-y-5">
            @csrf

            <x-kolom-isian nama="email" label="Email" tipe="email" autocomplete="email" />
            <x-kolom-isian nama="password" label="Kata sandi" tipe="password" autocomplete="current-password" />

            <label class="flex items-center gap-2 text-sm text-neutral-600">
                <input type="checkbox" name="ingat" value="1" class="border-neutral-300">
                Ingat saya
            </label>

            <button type="submit" class="w-full bg-neutral-900 px-5 py-2.5 text-sm text-white hover:bg-neutral-700">
                Masuk
            </button>
        </form>
    </section>
@endsection
