<?php

namespace App\Services;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationService
{
    public function index()
    {
        return Notification::all();
    }

    public function store(Request $request)
    {
        return Notification::create($request->all());
    }

    public function show($id)
    {
        return Notification::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $notification = Notification::findOrFail($id);
        $notification->update($request->all());
        return $notification;
    }

    public function destroy($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->delete();
        return response(null, 204);
    }
}
