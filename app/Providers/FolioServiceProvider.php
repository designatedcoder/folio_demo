<?php

namespace App\Providers;

use App\Enums\AdminStatus;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Laravel\Folio\Folio;

class FolioServiceProvider extends ServiceProvider
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
        Folio::path(resource_path('views/pages'))->middleware([
            '*' => [
               'auth',
            ],
            'admin/*' => [
               function (Request $request, Closure $next) {
                    if ($request->user()->is_admin == AdminStatus::USER) {
                    // if ($request->user()->is_admin == 0) {
                        return redirect()->route('dashboard');
                    }
                    return $next($request);
               }
            ],
        ]);
    }
}
