<?php

namespace App\Providers;

use App\Models\ContactSetting;
use App\Models\HomeSetting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Share contact data ke semua view
        View::composer('*', function ($view) {
            // Ambil data kontak
            $contact = ContactSetting::where('is_active', true)->first() ?? new ContactSetting();
            
            // Ambil data dari home_settings
            $homeSetting = HomeSetting::where('is_active', true)->first();
            
            if ($homeSetting) {
                // Data Maps
                $contact->map_title = $homeSetting->map_title;
                $contact->map_address = $homeSetting->map_address;
                $contact->map_url = $homeSetting->map_url;
                $contact->map_button_text = $homeSetting->map_button_text;
                $contact->map_description = $homeSetting->map_description;
                $contact->map_operational_hours = $homeSetting->map_operational_hours;
                $contact->map_closed_day = $homeSetting->map_closed_day;
                
                // Form Link
                $contact->form_link = $homeSetting->product_booking_link ?? null;
            }
            
            $view->with('contact', $contact);
        });
    }
}