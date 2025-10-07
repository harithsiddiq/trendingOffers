<?php

namespace App\Services;

use App\Models\StoreImage;
use Illuminate\Http\Request;

class StoreImageService
{
    public function index()
    {
        return StoreImage::all();
    }

    public function store(Request $request)
    {
        return StoreImage::create($request->all());
    }

    public function show($id)
    {
        return StoreImage::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $storeImage = StoreImage::findOrFail($id);
        $storeImage->update($request->all());
        return $storeImage;
    }

    public function destroy($id)
    {
        $storeImage = StoreImage::findOrFail($id);
        $storeImage->delete();
        return response(null, 204);
    }
}
