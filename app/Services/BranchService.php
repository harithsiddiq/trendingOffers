<?php

namespace App\Services;

use App\Models\Branch;
use Illuminate\Http\Request;

class BranchService
{
    public function index()
    {
        return Branch::all();
    }

    public function store(Request $request)
    {
        return Branch::create($request->all());
    }

    public function show($id)
    {
        return Branch::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $branch = Branch::findOrFail($id);
        $branch->update($request->all());
        return $branch;
    }

    public function destroy($id)
    {
        $branch = Branch::findOrFail($id);
        $branch->delete();
        return response(null, 204);
    }
}
