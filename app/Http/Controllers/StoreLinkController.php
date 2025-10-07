<?php

namespace App\Http\Controllers;

use App\Models\StoreLink;
use App\Services\StoreLinkService;
use Illuminate\Http\Request;

class StoreLinkController extends Controller
{
    protected $service;

    public function __construct(StoreLinkService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return $this->service->index();
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
}
