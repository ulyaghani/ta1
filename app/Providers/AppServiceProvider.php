<?php

namespace App\Providers;

use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            if (Auth::check()) {
                $messages = Message::where('user_id', Auth::id())
                                   ->orWhere('adminchat_id', Auth::id())
                                   ->get();
    
                $view->with('messages', $messages)
                     ->with('title', 'Chat Room');
            }
        });
    }
}
