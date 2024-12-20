<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\File;
use App\Models\Post;
use App\Models\Sdg;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy ( 'created_at', 'desc' )->get ();
//        return response()->json ( $posts );
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title_uz' => 'required|string|max:255',
            'title_ru' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'text_uz' => 'nullable|string',
            'text_ru' => 'nullable|string',
            'text_en' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
        ]);

        $slug = Str::slug($request->input('title_uz'));
        $originalSlug = $slug;

        $count = 2;
        // Tekshiruv - Bir xil slug mavjudligini tekshiramiz
        while (Post::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        $requestData = $request->all();
        $requestData['status'] = 0; // Post nofaol (status = 0) bo'lib saqlanadi
        $requestData['slug'] = $slug;
        $requestData['user_id'] = auth()->user()->id; // user_id ni kiritamiz

        Post::create($requestData);

        return redirect()->route('admin.posts.index')->with('success', 'Post created successfully.');
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
    public function edit(Post $post)
    {
        $categories = Category::all();

        $files = File::where('post_id', $post->id)->orderBy('created_at', 'desc')->get();
        return view('admin.posts.edit', compact('post', 'categories', 'files'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title_uz' => 'required|string|max:255',
            'title_ru' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'text_uz' => 'nullable|string',
            'text_ru' => 'nullable|string',
            'text_en' => 'nullable|string',
            'created_at' => 'required|date',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'status' => 'required|boolean',

        ]);

        $slug = Str::slug($request->input('title_uz'));
        $originalSlug = $slug;

        $count = 2;
        while (Post::where('slug', $slug)->where('id', '!=', $post->id)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        $requestData = $request->all();
        $requestData['slug'] = $slug;

        // Hozirgi foydalanuvchi ID sini user_id ga yozamiz
        $requestData['user_id'] = auth()->user()->id;

        // Post yangilash
        $post->update($requestData);

        return redirect()->route('admin.posts.index')->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // Postga tegishli barcha fayllarni o'chirish
        foreach ($post->files as $file) {

            if ($file->image) {
                Storage::disk('public')->delete($file->image);
            }

            // Hujjatni o'chirish
            if ($file->file) {
                Storage::disk('public')->delete($file->file);
            }

            $file->delete();
        }

        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'Post va unga tegishli fayllar muvaffaqiyatli o\'chirildi.');
    }

}
