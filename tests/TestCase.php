<?php

namespace Tests;


use http\Client\Curl\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    protected function user()
    {
        return factory(User::class)->create();
    }
}
