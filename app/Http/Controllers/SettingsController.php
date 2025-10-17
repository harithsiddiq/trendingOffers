<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class SettingsController extends Controller
{
    /**
     * Return general public settings (key-value sourced).
     */
    public function show(Request $request)
    {
        return response()->json([
            'success' => true,
            'data' => [
                // Keep name/email fields, sourced from settings
                'name' => Setting::get('site_name'),
                'email' => Setting::get('contact_email'),
                // Social links
                'tiktok_url' => Setting::get('tiktok_url'),
                'instagram_url' => Setting::get('instagram_url'),
                'whatsapp_url' => Setting::get('whatsapp_url'),
                'x_url' => Setting::get('x_url'),
            ],
        ]);
    }
}
