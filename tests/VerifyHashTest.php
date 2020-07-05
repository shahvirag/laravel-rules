<?php

use Illuminate\Support\Facades\Hash;
use Orchestra\Testbench\TestCase;
use Shahvirag\LaravelRules\VerifyHash;

class VerifyHashTest extends TestCase
{
    /**
     * Setup the test environment.
     */
    protected function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function valid_hash()
    {
        $hash = Hash::make('password');
        $rule = new VerifyHash($hash);
        $this->assertTrue($rule->passes('password', 'password'));
    }

    /** @test */
    public function invalid_hash()
    {
        $hash = Hash::make('password');
        $rule = new VerifyHash($hash);
        $this->assertFalse($rule->passes('password', 'secret'));
    }
}
