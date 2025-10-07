<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class StoreOwnerController extends Controller
{
    /**
     * Show the store owner registration form.
     */
    public function showRegistrationForm()
    {
        return view('auth.store-owner-register');
    }

    /**
     * Handle store owner registration.
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Password::defaults()],
            'cr_number' => ['required', 'string', 'max:255', 'unique:users'],
            'cr_image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Handle file upload
        $crImagePath = null;
        if ($request->hasFile('cr_image')) {
            $crImagePath = $request->file('cr_image')->store('cr_images', 'public');
        }

        // Create the store owner
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'cr_number' => $request->cr_number,
            'cr_image' => $crImagePath,
        ]);

        // Log the user in
        Auth::login($user);

        return redirect()->route('dashboard')->with('success', 'Registration successful! Welcome to Makan.');
    }
}