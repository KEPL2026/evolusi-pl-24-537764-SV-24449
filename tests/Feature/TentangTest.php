<?php

namespace Tests\Feature;

use Tests\TestCase;

class TentangTest extends TestCase
{
    public function test_halaman_tentang_dapat_diakses(): void
    {
        $this->get('/tentang')
            ->assertOk()
            ->assertSee('Tentang Ruang Rumah');
    }

    public function test_halaman_tentang_menampilkan_seluruh_nilai(): void
    {
        $response = $this->get(route('tentang'));

        $response->assertViewHas('nilai', fn ($nilai) => count($nilai) === 3);
        $response->assertSee('Bahan yang jujur');
        $response->assertSee('Dikerjakan perajin lokal');
        $response->assertSee('Dibuat untuk dipakai lama');
    }

    public function test_header_memuat_tautan_ke_halaman_tentang(): void
    {
        $this->get('/')->assertSee(route('tentang'), false);
    }
}
