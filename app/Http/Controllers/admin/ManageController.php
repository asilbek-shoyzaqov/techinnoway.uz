<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Manage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ManageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $manages = Manage::all();
        return view('admin.manages.index', compact('manages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.manages.create');
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
            'profession_uz' => 'nullable|string|max:255',
            'profession_ru' => 'nullable|string|max:255',
            'profession_en' => 'nullable|string|max:255',
            'email' => 'nullable|string|max:255',
            'tel' => 'nullable|string|max:255',
            'reception_time' => 'nullable|string|max:255',
            'address_uz' => 'nullable|string|max:255',
            'address_ru' => 'nullable|string|max:255',
            'address_en' => 'nullable|string|max:255',
            'body_uz' => 'nullable|string',
            'body_ru' => 'nullable|string',
            'body_en' => 'nullable|string',
            'view_template' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
        ]);

        $slug = Str::slug($request->input('name_uz'));
        $originalSlug = $slug;

        $count = 2;
        while (Manage::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        $requestData = $request->all();
        $requestData['slug'] = $slug;

        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            $currentTimestamp = now()->format('YmdHis');
            $imageFileName = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME) . '-' . $currentTimestamp . '.' . $imageFile->getClientOriginalExtension();
            $requestData['image'] = $imageFile->storeAs('images', $imageFileName, 'public');
        }

        Manage::create($requestData);
        return redirect()->route('admin.manages.index')->with('success', 'Manage created successfully.');
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
    public function edit(Manage $manage)
    {
        return view('admin.manages.edit', compact('manage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Manage $manage)
    {
        $request->validate([
            'name_uz' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'profession_uz' => 'nullable|string|max:255',
            'profession_ru' => 'nullable|string|max:255',
            'profession_en' => 'nullable|string|max:255',
            'email' => 'nullable|string|max:255',
            'tel' => 'nullable|string|max:255',
            'reception_time' => 'nullable|string|max:255',
            'address_uz' => 'nullable|string|max:255',
            'address_ru' => 'nullable|string|max:255',
            'address_en' => 'nullable|string|max:255',
            'body_uz' => 'nullable|string',
            'body_ru' => 'nullable|string',
            'body_en' => 'nullable|string',
            'view_template' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
        ]);

        $slug = Str::slug($request->input('name_uz'));
        $originalSlug = $slug;

        $count = 2;
        while (Manage::where('slug', $slug)->where('id', '!=', $manage->id)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        $requestData = $request->all();
        $requestData['slug'] = $slug;

        if ($request->hasFile('image')) {
            if ($manage->image && Storage::disk('public')->exists($manage->image)) {
                Storage::disk('public')->delete($manage->image);
            }

            $imageFile = $request->file('image');
            $currentTimestamp = now()->format('YmdHis');
            $imageFileName = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME) . '-' . $currentTimestamp . '.' . $imageFile->getClientOriginalExtension();
            $requestData['image'] = $imageFile->storeAs('images', $imageFileName, 'public');
        }

        $manage->update($requestData);
        return redirect()->route('admin.manages.index')->with('success', 'Manage updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Manage $manage)
    {
        if ($manage->image && Storage::disk('public')->exists($manage->image)) {
            Storage::disk('public')->delete($manage->image);
        }

        $manage->delete ();
        return redirect()->route('admin.manages.index')->with('success', 'Manage deleted successfully.');
    }
}
