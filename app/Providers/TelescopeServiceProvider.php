<?php


namespace App\Providers;

use Illuminate\Auth\Access\Gate;

class TelescopeServiceProvider
{
    /**
     * Register the Telescope gate.
     *
     * This gate determines who can access Telescope in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewTelescope', function ($user) {
            return in_array($user->email, [
                'arturdanielyan96@gmail.com',
            ]);
        });
    }
}
