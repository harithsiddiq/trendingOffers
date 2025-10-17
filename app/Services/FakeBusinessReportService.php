<?php

namespace App\Services;

use App\Models\FakeBusinessReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FakeBusinessReportService
{
    public function store(Request $request)
    {
        return FakeBusinessReport::create([
            'user_id' => Auth::id(),
            'store_id' => $request->input('store_id'),
            'reason' => $request->input('reason'),
        ]);
    }

    public function findByUserAndStore(int $userId, int $storeId)
    {
        return FakeBusinessReport::with(['user', 'store'])
            ->where('user_id', $userId)
            ->where('store_id', $storeId)
            ->first();
    }
}