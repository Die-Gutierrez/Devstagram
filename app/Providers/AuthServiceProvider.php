<?php

namespace App\Providers;

use App\auth\CustomUserProvider;
use Illuminate\Hashing\BcryptHasher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Auth::provider('custom_user_provider', function ($app, array $config) {
            return new CustomUserProvider(new BcryptHasher(), $config['model']);
        });
    }
}
