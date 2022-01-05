<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Carbon\Carbon;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('rupiah', function ($expression) {
            return "Rp. <?php echo number_format($expression, 0, ',', '.'); ?>";
        });

        Carbon::setLocale(config('app.locale'));
        Carbon::setLocale('id');
        date_default_timezone_set('Asia/Jakarta');
    }
}
