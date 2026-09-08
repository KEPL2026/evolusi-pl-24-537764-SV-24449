<?php

namespace Tests\Feature;

use Tests\TestCase;

class BerandaTest extends TestCase
{
    public function test_beranda_dapat_diakses(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertSee('Ruang Rumah')
            ->assertSee('Produk terbaru');
    }

    public function test_beranda_menampilkan_daftar_produk(): void
    {
        $response = $this->get('/');

        $response->assertSee('Kursi Kayu Ek');
        $response->assertSee('Buku Catatan Jilid Benang');
        $response->assertViewHas('produk', fn ($produk) => count($produk) === 8);
    }

    public function test_harga_diformat_dalam_rupiah(): void
    {
        $this->get('/')
            ->assertSee('Rp1.250.000')
            ->assertSee('Rp68.000');
    }

    public function test_beranda_menampilkan_filter_kategori(): void
    {
        $response = $this->get('/');

        foreach (['Semua', 'Furnitur', 'Dapur', 'Dekorasi', 'Alat Tulis'] as $kategori) {
            $response->assertSee($kategori);
        }
    }
}
