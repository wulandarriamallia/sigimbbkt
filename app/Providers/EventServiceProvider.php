<?php

namespace sigimbbkt\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'sigimbbkt\Events\SomeEvent' => [
            'sigimbbkt\Listeners\EventListener',
        ],
//        'Illuminate\Cache\Events\CacheHit' => [
//          'sigimbbkt\Listeners\LogCacheHit',
//        ],
//        'Illuminate\Cache\Events\CacheMissed' => [
//          'sigimbbkt\Listeners\LogCacheMissed',
//        ],
//        'Illuminate\Cache\Events\KeyForgotten' => [
//          'sigimbbkt\Listeners\LogKeyForgotten',
//        ],
//        'Illuminate\Cache\Events\KeyWritten' => [
//          'sigimbbkt\Listeners\LogKeyWritten',
//        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
