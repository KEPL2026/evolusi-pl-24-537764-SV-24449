<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class TentangController extends Controller
{
    public function index(): View
    {
        return view('tentang', [
            'nilai' => $this->nilai(),
        ]);
    }

    /**
     * Nilai yang dipegang toko, ditampilkan sebagai daftar di halaman tentang.
     *
     * @return array<int, array<string, string>>
     */
    private function nilai(): array
    {
        return [
            [
                'judul' => 'Bahan yang jujur',
                'isi' => 'Kayu ek bersertifikat, keramik bakaran tinggi, dan logam tanpa lapisan berbahaya.',
            ],
            [
                'judul' => 'Dikerjakan perajin lokal',
                'isi' => 'Seluruh produk dibuat oleh belasan perajin di Yogyakarta dan Jepara.',
            ],
            [
                'judul' => 'Dibuat untuk dipakai lama',
                'isi' => 'Setiap barang dirancang agar bisa diperbaiki, bukan sekali pakai lalu dibuang.',
            ],
        ];
    }
}
