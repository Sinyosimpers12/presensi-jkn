<?php

namespace App\Providers;

use App\Events\AttendanceCreated;
use App\Events\FaceEnrolled;
use App\Listeners\LogAttendanceActivity;
use App\Listeners\LogFaceEnrollment;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        AttendanceCreated::class => [
            LogAttendanceActivity::class,
        ],
        FaceEnrolled::class => [
            LogFaceEnrollment::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        parent::boot();

        // Additional event listeners can be registered here
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
