<?php
 
namespace App\Listeners;
 
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Illuminate\Auth\Events\PasswordReset;

class UserEventSubscriber
{
    /**
     * Handle user login events.
     */
    public function handleUserLogin($event) {}
 
    /**
     * Handle user logout events.
     */
    public function handleUserLogout($event) {}

    /**
     * Handle user passwordreset events.
     */
    public function handleUserPasswordReset($event) {
        $event->user->update([
            'password_changed_at'=>now(),
            'password_status'=>true
        ]);
        // return true;
    }
 
    /**
     * Register the listeners for the subscriber.
     *
     * @param  \Illuminate\Events\Dispatcher  $events
     * @return array
     */
    public function subscribe($events)
    {
        return [
            Login::class => 'handleUserLogin',
            Logout::class => 'handleUserLogout',
            PasswordReset::class => 'handleUserPasswordReset',
        ];
    }
}