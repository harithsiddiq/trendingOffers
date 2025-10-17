<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    /**
     * Return the current user's settings (social links and basic info).
     */
    public function show(Request $request)
    {
        $user = $request->user();

        return response()->json([
            'success' => true,
            'data' => [
                'name' => $user->name,
                'email' => $user->email,
                'tiktok_url' => $user->tiktok_url,
                'instagram_url' => $user->instagram_url,
                'whatsapp_url' => $user->whatsapp_url,
                'x_url' => $user->x_url,
            ],
        ]);
    }
}