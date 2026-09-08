<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AutentikasiTest extends TestCase
{
    use RefreshDatabase;

    public function test_halaman_masuk_dan_daftar_dapat_diakses(): void
    {
        $this->get('/masuk')->assertOk()->assertSee('Masuk');
        $this->get('/daftar')->assertOk()->assertSee('Buat akun');
    }

    public function test_pengguna_baru_dapat_mendaftar(): void
    {
        $response = $this->post('/daftar', [
            'name' => 'Sinta Dewi',
            'email' => 'sinta@example.test',
            'password' => 'rahasia12345',
            'password_confirmation' => 'rahasia12345',
        ]);

        $response->assertRedirect(route('akun'));
        $this->assertAuthenticated();
        $this->assertDatabaseHas('users', ['email' => 'sinta@example.test']);
    }

    public function test_pendaftaran_menolak_email_yang_sudah_terpakai(): void
    {
        User::factory()->create(['email' => 'sinta@example.test']);

        $this->post('/daftar', [
            'name' => 'Sinta Lain',
            'email' => 'sinta@example.test',
            'password' => 'rahasia12345',
            'password_confirmation' => 'rahasia12345',
        ])->assertSessionHasErrors('email');

        $this->assertGuest();
    }

    public function test_pendaftaran_menolak_konfirmasi_kata_sandi_yang_berbeda(): void
    {
        $this->post('/daftar', [
            'name' => 'Sinta Dewi',
            'email' => 'sinta@example.test',
            'password' => 'rahasia12345',
            'password_confirmation' => 'salah12345',
        ])->assertSessionHasErrors('password');

        $this->assertGuest();
    }

    public function test_pengguna_dapat_masuk_dengan_kredensial_yang_benar(): void
    {
        $pengguna = User::factory()->create(['password' => 'rahasia12345']);

        $response = $this->post('/masuk', [
            'email' => $pengguna->email,
            'password' => 'rahasia12345',
        ]);

        $response->assertRedirect(route('akun'));
        $this->assertAuthenticatedAs($pengguna);
    }

    public function test_kata_sandi_yang_salah_ditolak(): void
    {
        $pengguna = User::factory()->create(['password' => 'rahasia12345']);

        $this->post('/masuk', [
            'email' => $pengguna->email,
            'password' => 'kata-sandi-salah',
        ])->assertSessionHasErrors('email');

        $this->assertGuest();
    }

    public function test_pengguna_dapat_keluar(): void
    {
        $pengguna = User::factory()->create();

        $this->actingAs($pengguna)
            ->post('/keluar')
            ->assertRedirect(route('beranda'));

        $this->assertGuest();
    }

    public function test_tamu_diarahkan_ke_halaman_masuk_saat_membuka_akun(): void
    {
        $this->get('/akun')->assertRedirect(route('login'));
    }

    public function test_halaman_akun_menampilkan_data_pengguna(): void
    {
        $pengguna = User::factory()->create(['name' => 'Sinta Dewi', 'email' => 'sinta@example.test']);

        $this->actingAs($pengguna)
            ->get('/akun')
            ->assertOk()
            ->assertSee('Sinta Dewi')
            ->assertSee('sinta@example.test');
    }

    public function test_pengguna_yang_sudah_masuk_tidak_melihat_halaman_masuk(): void
    {
        $this->actingAs(User::factory()->create())
            ->get('/masuk')
            ->assertRedirect('/');
    }

    public function test_header_menyesuaikan_status_autentikasi(): void
    {
        $this->get('/')->assertSee('Daftar');

        $this->actingAs(User::factory()->create(['name' => 'Sinta Dewi']))
            ->get('/')
            ->assertSee('Sinta Dewi')
            ->assertSee('Keluar');
    }
}
