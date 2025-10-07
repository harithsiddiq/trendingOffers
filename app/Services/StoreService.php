<?php

namespace App\Services;

use App\Models\Store;
use Illuminate\Http\Request;

class StoreService
{
    public function index(Request $request = null)
    {
        $query = Store::query();

        // إضافة البحث الاختياري حسب المنطقة
        if ($request && $request->has('region_id')) {
            $query->where('region_id', $request->region_id);
        }

        return $query->with('user', 'region', 'category', 'storeImages', 'offers')->get();
    }


    public function store(Request $request)
    {
        // التحقق من صحة البيانات
        $validated = $request->validate([
            'user_id'      => 'required|exists:users,id',
            'region_id'    => 'required|exists:regions,id',
            'category_id'  => 'required|exists:categories,id',
            'name'         => 'required|string|max:255',
            'description'  => 'required|string',
            'address'      => 'required|string',
            'lat'          => 'required|numeric',
            'lng'          => 'required|numeric',
            'is_published' => 'boolean',
            'open_date'    => 'nullable|date',
            'logo_url'     => 'nullable|string',
        ]);

        // تغليف العملية كاملة داخل transaction
        $store = null;
        \DB::beginTransaction();
        try {
            // إضافة المتجر
            $store = Store::create($validated);


            // معالجة الصورة الرئيسية إذا تم رفعها
        if ($request->hasFile('main_image')) {
            $mainFile = $request->file('main_image');
            $mainPath = $mainFile->store('store_images', 'public');
            $mainPath = 'store_images/' . basename($mainPath);
            $store->storeImages()->create([
                'image_url' => $mainPath,
                'type' => 'main',
            ]);
        }

        // معالجة صور المعرض إذا تم رفعها
        if ($request->hasFile('gallery_images')) {
            $galleryFiles = $request->file('gallery_images');
            // إذا كان ملف واحد فقط
            if (!is_array($galleryFiles)) {
                $galleryFiles = [$galleryFiles];
            }
            foreach ($galleryFiles as $galleryFile) {
                $galleryPath = $galleryFile->store('store_images', 'public');
                $galleryPath = 'store_images/' . basename($galleryPath);
                $store->storeImages()->create([
                    'image_url' => $galleryPath,
                    'type' => 'normal',
                ]);
            }
        }

        \DB::commit();
        return $store->load('user', 'region', 'category', 'storeImages');
        } catch (\Exception $e) {
            \DB::rollBack();
            throw $e;
        }
    }

    public function show($id)
    {
        return Store::findOrFail($id)->load('user', 'region', 'category', 'storeImages');
    }

    public function update(Request $request, $id)
    {
        $store = Store::findOrFail($id);
        $store->update($request->all());
        return $store;
    }

    public function destroy($id)
    {
        $store = Store::findOrFail($id);
        $store->delete();
        return response(null, 204);
    }

    public function userStore($userId)
    {
        return Store::where('user_id', $userId)->first();
    }
}
