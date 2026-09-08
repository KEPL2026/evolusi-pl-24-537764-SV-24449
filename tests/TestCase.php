<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        // Aset Vite tidak ikut di-commit, jadi tidak dibutuhkan saat menguji Blade.
        $this->withoutVite();
    }
}
