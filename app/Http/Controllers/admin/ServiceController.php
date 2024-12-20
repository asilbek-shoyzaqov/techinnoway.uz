<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Submenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::all();
        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $submenus = Submenu::all();
        return view('admin.services.create', compact('submenus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'submenu_id' => 'required|exists:submenus,id',
            'name_uz' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'body_uz' => 'nullable|string',
            'body_ru' => 'nullable|string',
            'body_en' => 'nullable|string',
            'view_template' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Rasm yuklash uchun validatsiya
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
        ]);

        $slug = Str::slug($request->input('name_uz'));
        $originalSlug = $slug;

        $count = 2;
        // Tekshiruv - Bir xil slug mavjudligini tekshiramiz
        while (Service::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        $requestData = $request->all();
        $requestData['slug'] = $slug;

        // Agar rasm yuklangan bo'lsa, uni saqlash
        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            // Hozirgi vaqtni formatlang (YYYYMMDDHHMMSS)
            $currentTimestamp = now()->format('YmdHis');
            // Fayl nomini yaratish (asl nomi + vaqt tamg'asi)
            $imageFileName = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME) . '-' . $currentTimestamp . '.' . $imageFile->getClientOriginalExtension();
            // Faylni `storage/app/public/images` ichiga saqlash
            $requestData['image'] = $imageFile->storeAs('images', $imageFileName, 'public');
        }

        Service::create($requestData);
        return redirect()->route('admin.services.index')->with('success', 'Service created successfully.');
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
    public function edit(Service $service)
    {
        $submenus = Submenu::all();
        return view('admin.services.edit', compact('service', 'submenus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'submenu_id' => 'required|exists:submenus,id',
            'name_uz' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'body_uz' => 'nullable|string',
            'body_ru' => 'nullable|string',
            'body_en' => 'nullable|string',
            'view_template' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Rasm yuklash uchun validatsiya
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
        ]);

        $slug = Str::slug($request->input('name_uz'));
        $originalSlug = $slug;

        $count = 2;
        // Tekshiruv - Bir xil slug mavjudligini tekshiramiz, lekin hozirgi serviceni o'z ichiga olmasligi kerak
        while (Service::where('slug', $slug)->where('id', '!=', $service->id)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        $requestData = $request->all();
        $requestData['slug'] = $slug;

        // Agar yangi rasm yuklangan bo'lsa, eski rasmni o'chirish va yangi rasmni saqlash
        if ($request->hasFile('image')) {
            // Eski rasmni o'chirish
            if ($service->image && Storage::disk('public')->exists($service->image)) {
                Storage::disk('public')->delete($service->image); // Eski rasmni o'chirish
            }

            // Yangi rasmni saqlash
            $imageFile = $request->file('image');
            // Hozirgi vaqtni formatlang (YYYYMMDDHHMMSS)
            $currentTimestamp = now()->format('YmdHis');
            // Fayl nomini yaratish (asl nomi + vaqt tamg'asi)
            $imageFileName = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME) . '-' . $currentTimestamp . '.' . $imageFile->getClientOriginalExtension();
            // Faylni `storage/app/public/images` ichiga saqlash
            $requestData['image'] = $imageFile->storeAs('images', $imageFileName, 'public');
        }

        $service->update($requestData);

        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        // Agar rasm mavjud bo'lsa, uni o'chirish
        if ($service->image && Storage::disk('public')->exists($service->image)) {
            Storage::disk('public')->delete($service->image); // Rasmni o'chirish
        }

        // Servisni o'chirish
        $service->delete();

        // Bosh sahifaga qaytish va muvaffaqiyatli xabarni ko'rsatish
        return redirect()->route('admin.services.index')->with('success', 'Service deleted successfully.');
    }

}
