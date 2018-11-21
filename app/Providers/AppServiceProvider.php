<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Auth;
use App\Model\Classroom;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Carbon\Carbon::setLocale('pt_BR');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(\App\Contracts\ActualClassroom::class, function () {
            if (!request()->is('forum/*')) {
                return new Classroom();
            }
            $classroom = Classroom::find(request()->route('id'));
            if ($classroom) {
                $classroom->loadDefault();
                return $classroom;
            }
            return new Classroom();
            
        });
        $this->app->singleton(\App\Contracts\StorageServiceContract::class, function ($app) {
            return $app->make(\App\Service\StorageService::class);
        });
        $this->app->singleton(\App\Contracts\FileResolverServiceContract::class, function ($app) {
            return $app->make(\App\Service\FileResolverService::class);
        });
    }
}
