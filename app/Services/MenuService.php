<?php

namespace App\Services;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuService
{
    public function index()
    {
        return Menu::all();
    }

    public function store(Request $request)
    {
        return Menu::create($request->all());
    }

    public function show($id)
    {
        return Menu::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $menu = Menu::findOrFail($id);
        $menu->update($request->all());
        return $menu;
    }

    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();
        return response(null, 204);
    }
}
