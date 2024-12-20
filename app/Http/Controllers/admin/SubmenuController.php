<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Submenu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubmenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $submenus = Submenu::all();
        return view('admin.submenus.index', compact('submenus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $menus = Menu::all();
        return view('admin.submenus.create', compact('menus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'menu_id' => 'required|exists:menus,id',
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
        while (Submenu::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        $requestData = $request->all();
        $requestData['slug'] = $slug;

        Submenu::create($requestData);
        return redirect()->route('admin.submenus.index')->with('success', 'Submenu created successfully.');
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
    public function edit(Submenu $submenu)
    {
        $menus = Menu::all();
        return view('admin.submenus.edit', compact('submenu', 'menus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Submenu $submenu)
    {
        $request->validate([
            'menu_id' => 'required|exists:menus,id',
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
        while (Submenu::where('slug', $slug)->where('id', '!=', $submenu->id)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        $requestData = $request->all();
        $requestData['slug'] = $slug;

        $submenu->update($requestData);

        return redirect()->route('admin.submenus.index')->with('success', 'Submenu updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Submenu $submenu)
    {
        $submenu->delete ();
        return redirect()->route('admin.submenus.index')->with('success', 'Submenu deleted successfully.');
    }
}
