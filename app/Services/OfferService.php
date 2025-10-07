<?php

namespace App\Services;

use App\Models\Offer;
use Illuminate\Http\Request;


class OfferService
{
    public function index(Request $request = null)
    {

        $request = request();
        $query = Offer::query();

        if ($request && $request->has('include_inactive')) {
            // Include all offers if specifically requested
        } else {
            // By default, only return active offers
            $query->where('is_active', true);
        }

        if ($request && $request->has('business_id')) {
            // Filter by business ID if provided
            $query->where('store_id', $request->input('business_id'));
        }

        return $query->get();
    }

    public function store(Request $request)
    {
        return Offer::create($request->all());
    }

    public function show($id)
    {
        return Offer::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $offer = Offer::findOrFail($id);
        $offer->update($request->all());
        return $offer;
    }

    public function destroy($id)
    {
        $offer = Offer::findOrFail($id);
        $offer->delete();
        return response(null, 204);
    }
}
