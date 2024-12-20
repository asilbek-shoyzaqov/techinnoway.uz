<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $files = File::all ();
        return view ('admin.files.index', compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $posts = Post::all();
        return view ('admin.files.create', compact('posts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'post_id' => 'required|exists:posts,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'file' => 'nullable|mimes:pdf,doc,docx,zip|max:5000', // 5MB limit
        ]);

        // Fayllarni oling
        $imageFile = $request->file('image');
        $uploadedFile = $request->file('file');

        // Hozirgi vaqtni formatlang (YYYYMMDDHHMMSS)
        $currentTimestamp = now()->format('YmdHis');

        // Fayllar yo'llari
        $imagePath = null;
        $filePath = null;

        // Rasm yuklash
        if ($imageFile) {
            $imageFileName = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME) . '-' . $currentTimestamp . '.' . $imageFile->getClientOriginalExtension();
            $imagePath = $imageFile->storeAs('images', $imageFileName, 'public');
        }

        // Hujjat yuklash
        if ($uploadedFile) {
            $fileFileName = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME) . '-' . $currentTimestamp . '.' . $uploadedFile->getClientOriginalExtension();
            $filePath = $uploadedFile->storeAs('files', $fileFileName, 'public');
        }

        // Ma'lumotlarni bazaga saqlang
        File::create([
            'post_id' => $request->post_id,
            'image' => $imagePath,
            'file' => $filePath,
        ]);

        return redirect()->back()->with('success', "Fayl muvaffaqiyatli yuklandi");
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
    public function edit($id)
    {
        $files = File::findOrFail($id);
        return view ('admin.files.edit', compact('files'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // So'rov ma'lumotlarini tasdiqlash
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'file' => 'nullable|mimes:pdf,doc,docx,zip|max:5000',
        ]);

        // Faylni ID bo'yicha topish
        $file = File::findOrFail($id);

        // Hozirgi vaqtni formatlash (YYYYMMDDHHMMSS)
        $currentTimestamp = now()->format('YmdHis');

        // Rasm faylini yuklash
        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            $imageFileName = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME) . '-' . $currentTimestamp . '.' . $imageFile->getClientOriginalExtension();

            // Eski faylni o'chirish
            if ($file->image && Storage::disk('public')->exists($file->image)) {
                Storage::disk('public')->delete($file->image);
            }

            // Yangi faylni saqlash
            $file->image = $imageFile->storeAs('images', $imageFileName, 'public');
        }

        // Hujjat faylini yuklash
        if ($request->hasFile('file')) {
            $uploadedFile = $request->file('file');
            $fileFileName = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME) . '-' . $currentTimestamp . '.' . $uploadedFile->getClientOriginalExtension();

            // Eski faylni o'chirish
            if ($file->file && Storage::disk('public')->exists($file->file)) {
                Storage::disk('public')->delete($file->file);
            }

            // Yangi faylni saqlash
            $file->file = $uploadedFile->storeAs('files', $fileFileName, 'public');
        }

        // Faylni saqlash
        $file->save();

        // Muvaffaqiyatli xabar bilan qayta yo'naltirish
        return redirect()->back()->with('success', 'Fayl muvaffaqiyatli yangilandi');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(File $file)
    {
        // Rasmni o'chirish
        if ($file->image && Storage::disk('public')->exists($file->image)) {
            Storage::disk('public')->delete($file->image);
        }

        // Hujjatni o'chirish
        if ($file->file && Storage::disk('public')->exists($file->file)) {
            Storage::disk('public')->delete($file->file);
        }

        // Faylni o'chirish
        $file->delete();

        return redirect()->back()->with('success', "Fayl muvaffaqiyatli o'chirildi");
    }
}
