<?php

namespace KaracaTech\Tests;

use Illuminate\Support\Facades\File;
//use Orchestra\Testbench\TestCase as Orchestra; // For Laravel packages
use PHPUnit\Framework\TestCase as BaseTest;

class TestCase extends BaseTest
{

    protected function setUp(): void
    {
        parent::setUp();
    }
}
