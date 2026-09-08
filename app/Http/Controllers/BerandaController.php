<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class BerandaController extends Controller
{
    public function index(): View
    {
        return view('beranda', [
            'kategori' => ['Semua', 'Furnitur', 'Dapur', 'Dekorasi', 'Alat Tulis'],
            'produk' => $this->produk(),
        ]);
    }

    /**
     * Data contoh. Nanti diganti query ke tabel produk.
     *
     * @return array<int, array<string, mixed>>
     */
    private function produk(): array
    {
        return [
            ['nama' => 'Kursi Kayu Ek', 'kategori' => 'Furnitur', 'harga' => 1250000, 'gambar' => 'kursi'],
            ['nama' => 'Lampu Meja Linen', 'kategori' => 'Dekorasi', 'harga' => 480000, 'gambar' => 'lampu'],
            ['nama' => 'Cangkir Keramik 250 ml', 'kategori' => 'Dapur', 'harga' => 95000, 'gambar' => 'cangkir'],
            ['nama' => 'Vas Bunga Tanah Liat', 'kategori' => 'Dekorasi', 'harga' => 165000, 'gambar' => 'vas'],
            ['nama' => 'Jam Dinding Minimalis', 'kategori' => 'Dekorasi', 'harga' => 320000, 'gambar' => 'jam'],
            ['nama' => 'Teko Stainless 1,2 L', 'kategori' => 'Dapur', 'harga' => 275000, 'gambar' => 'teko'],
            ['nama' => 'Tanaman Hias + Pot', 'kategori' => 'Dekorasi', 'harga' => 130000, 'gambar' => 'pot'],
            ['nama' => 'Buku Catatan Jilid Benang', 'kategori' => 'Alat Tulis', 'harga' => 68000, 'gambar' => 'buku'],
        ];
    }
}
