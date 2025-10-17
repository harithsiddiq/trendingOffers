<?php

namespace App\Http\Controllers;

use App\Services\FakeBusinessReportService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FakeBusinessReportController extends Controller
{
    protected $service;

    public function __construct(FakeBusinessReportService $service)
    {
        $this->service = $service;
    }

    public function store(Request $request)
    {
        $request->validate([
            'store_id' => 'required|exists:stores,id',
            'reason' => 'required|string|max:1000',
        ]);

        if (!Auth::check()) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthenticated.'
            ], 401);
        }

        $report = $this->service->store($request);

        return response()->json([
            'success' => true,
            'message' => 'Report submitted successfully.',
            'data' => $report->load('user', 'store'),
        ], 201);
    }

    public function showByUserAndStore($userId, $storeId)
    {
        if (!Auth::check()) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthenticated.'
            ], 401);
        }

        $isOwner = Auth::id() === (int) $userId;
        $isAdmin = Auth::user() && (Auth::user()->role ?? null) === 'admin';
        if (!$isOwner && !$isAdmin) {
            return response()->json([
                'success' => false,
                'message' => 'Forbidden.'
            ], 403);
        }

        $report = $this->service->findByUserAndStore((int) $userId, (int) $storeId);
        if (!$report) {
            return response()->json([
                'success' => false,
                'message' => 'Report not found.'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $report,
        ]);
    }
}