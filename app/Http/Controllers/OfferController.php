<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Store;
use App\Services\OfferService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OfferController extends Controller
{
    protected $service;

    public function __construct(OfferService $service)
    {
        $this->service = $service;
    }

    // API methods
    public function index()
    {
        return $this->service->index();
    }

    public function store(Request $request)
    {
    //    return $request->all();
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

    // Web methods for forms
    public function create()
    {
        $stores = Store::where('user_id', Auth::id())->get();
        return view('offers.create', compact('stores'));
    }

    public function storeWeb(Request $request)
    {
        $request->validate([
            'store_id' => 'required|exists:stores,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'discount_type' => 'required|in:percentage,fixed',
            'discount_value' => 'required|numeric|min:0',
        ]);

        // Verify the store belongs to the authenticated user
        $store = Store::where('id', $request->store_id)
                     ->where('user_id', Auth::id())
                     ->firstOrFail();

        Offer::create([
            'store_id' => $request->store_id,
            'title' => $request->title,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'discount_type' => $request->discount_type,
            'discount_value' => $request->discount_value,
            'is_active' => true
        ]);

        return redirect()->route('dashboard')->with('success', 'Offer created successfully!');
    }

    public function myOffers()
    {
        $offers = Offer::whereHas('store', function($query) {
            $query->where('user_id', Auth::id());
        })->with('store')->get();

        return view('offers.index', compact('offers'));
    }
}
