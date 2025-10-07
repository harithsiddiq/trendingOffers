<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Region;
use App\Models\Category;
use App\Services\StoreService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    protected $service;

    public function __construct(StoreService $service)
    {
        $this->service = $service;
    }

    // API methods
    public function index(Request $request)
    {
        return $this->service->index($request);
    }

    public function store(Request $request)
    {
        return $this->service->store($request);
    }

    public function show($id)
    {
        return $this->service->show($id);
    }

    public function update(Request $request, $id)
    {
        return $this->service->update($request, $id);
    }

    public function destroy($id)
    {
        return $this->service->destroy($id);
    }

    public function userStore($userId)
    {
        return $this->service->userStore($userId);
    }

    // Web methods for forms
    public function create()
    {
        $regions = Region::all();
        $categories = Category::all();
        return view('stores.create', compact('regions', 'categories'));
    }

    public function storeWeb(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'address' => 'required|string|max:255',
            'region_id' => 'required|exists:regions,id',
            'category_id' => 'required|exists:categories,id',
            'lat' => 'required|numeric',
            'lng' => 'required|numeric',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'open_date' => 'nullable|date'
        ]);

        $logoUrl = null;
        if ($request->hasFile('logo')) {
            $logoUrl = $request->file('logo')->store('store-logos', 'public');
        }

        Store::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'description' => $request->description,
            'address' => $request->address,
            'region_id' => $request->region_id,
            'category_id' => $request->category_id,
            'lat' => $request->lat,
            'lng' => $request->lng,
            'logo_url' => $logoUrl,
            'open_date' => $request->open_date,
            'is_published' => false
        ]);

        return redirect()->route('dashboard')->with('success', 'Store created successfully!');
    }

    public function myStores()
    {
        $stores = Store::where('user_id', Auth::id())->with(['region', 'category'])->get();
        return view('stores.index', compact('stores'));
    }

}

