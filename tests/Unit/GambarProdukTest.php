<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class GambarProdukTest extends TestCase
{
    /**
     * Setiap produk di beranda menunjuk ke berkas gambar yang benar-benar ada.
     */
    public function test_semua_gambar_produk_tersedia(): void
    {
        $gambar = ['kursi', 'lampu', 'cangkir', 'vas', 'jam', 'teko', 'pot', 'buku'];

        foreach ($gambar as $nama) {
            $this->assertFileExists(__DIR__."/../../public/images/produk/{$nama}.svg");
        }
    }
}
