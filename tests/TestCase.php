<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected function setUp(): void
    {
        // first include all the normal setUp operations
        parent::setUp();

        $this->artisan('db:seed', ['--class' => RolesAndPermissionsSeeder::class]);
        $this->app->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();
    }
}
