<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Policies\ProductPolicy;
use App\Models\Product;
use App\Models\User; 
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Product::class => ProductPolicy::class,
    ];
    
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('update-product', function (User $user, Product $product) {
            return $user->id === $product->user_id;
        });
    }
}
