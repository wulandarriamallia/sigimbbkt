<?php

namespace sigimbbkt\Providers;

use Illuminate\Support\Facades\Queue;
use Illuminate\Support\ServiceProvider;
use Illuminate\Queue\Events\JobProcessed;
use Illuminate\Queue\Events\JobProcessing;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      Queue::before(function (JobProcessing $event) {
        // $event->connectionName
        // $event->job
        // $event->job->payload()
      });

      Queue::after(function (JobProcessed $event) {
        // $event->connectionName
        // $event->job
        // $event->job->payload()
      });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
