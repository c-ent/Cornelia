<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class CustomValidationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Validator::extend('validRole', function ($attribute, $value, $parameters, $validator) {
            $currentUser = auth()->user();

            // Check if the current user's role_id is not 1
            if ($currentUser && $currentUser->role_id !== 1) {
                // If not, ensure that the selected role is "3" (User)
                return $value == 3;
            }

            // If the current user's role_id is 1 (Admin), no validation is needed
            return true;
        });
    }
}
