<?php

namespace App\Services;

use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteService
{
    public function index()
    {
        return Favorite::all();
    }

    public function store(Request $request)
    {
        return Favorite::create($request->all());
    }

    public function show($id)
    {
        return Favorite::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $favorite = Favorite::findOrFail($id);
        $favorite->update($request->all());
        return $favorite;
    }

    public function destroy($id)
    {
        $favorite = Favorite::findOrFail($id);
        $favorite->delete();
        return response(null, 204);
    }
}
