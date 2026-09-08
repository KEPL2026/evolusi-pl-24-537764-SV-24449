@extends('layouts.app')

@section('judul', 'Daftar')

@section('konten')
    <section class="mx-auto max-w-sm px-6 py-20">
        <h1 class="text-xl font-medium tracking-tight">Buat akun</h1>
        <p class="mt-2 text-sm text-neutral-600">
            Sudah punya akun?
            <a href="{{ route('login') }}" class="text-neutral-900 underline">Masuk di sini</a>.
        </p>

        <form method="POST" action="{{ route('register') }}" class="mt-8 space-y-5">
            @csrf

            <x-kolom-isian nama="name" label="Nama lengkap" autocomplete="name" />
            <x-kolom-isian nama="email" label="Email" tipe="email" autocomplete="email" />
            <x-kolom-isian nama="password" label="Kata sandi" tipe="password" autocomplete="new-password" />
            <x-kolom-isian nama="password_confirmation" label="Ulangi kata sandi" tipe="password" autocomplete="new-password" />

            <button type="submit" class="w-full bg-neutral-900 px-5 py-2.5 text-sm text-white hover:bg-neutral-700">
                Daftar
            </button>
        </form>
    </section>
@endsection
