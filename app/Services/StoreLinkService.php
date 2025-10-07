<?php

namespace App\Services;

use App\Models\StoreLink;
use Illuminate\Http\Request;

class StoreLinkService
{
    public function index()
    {
        return StoreLink::all();
    }

    public function store(Request $request)
    {
        return StoreLink::create($request->all());
    }

    public function show($id)
    {
        return StoreLink::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $storeLink = StoreLink::findOrFail($id);
        $storeLink->update($request->all());
        return $storeLink;
    }

    public function destroy($id)
    {
        $storeLink = StoreLink::findOrFail($id);
        $storeLink->delete();
        return response(null, 204);
    }
}
