<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::all();
        return view('admin.menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.menus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_uz' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'body_uz' => 'nullable|string',
            'body_ru' => 'nullable|string',
            'body_en' => 'nullable|string',
            'view_template' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
        ]);

        $slug = Str::slug($request->input('name_uz'));
        $originalSlug = $slug;

        $count = 2;
        // Tekshiruv - Bir xil slug mavjudligini tekshiramiz
        while (Menu::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        $requestData = $request->all();
        $requestData['slug'] = $slug;

        Menu::create($requestData);

        return redirect()->route('admin.menus.index')->with('success', 'Menu created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        return view('admin.menus.edit', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'name_uz' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'body_uz' => 'nullable|string',
            'body_ru' => 'nullable|string',
            'body_en' => 'nullable|string',
            'view_template' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
        ]);

        $slug = Str::slug($request->input('name_uz'));
        $originalSlug = $slug;

        $count = 2;
        // Tekshiruv - Bir xil slug mavjudligini tekshiramiz, lekin hozirgi menyudan tashqari
        while (Menu::where('slug', $slug)->where('id', '!=', $menu->id)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        $requestData = $request->all();
        $requestData['slug'] = $slug;

        $menu->update($requestData);

        return redirect()->route('admin.menus.index')->with('success', 'Menu updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('admin.menus.index')->with('success', 'Menu deleted successfully.');
    }

}
