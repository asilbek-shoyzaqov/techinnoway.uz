<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::latest()->get();
        return view('admin.comments.index', compact('comments'));
    }

    public function notifications()
    {
        // O'qilmagan commentlarni olish
        $unreadComments = Comment::where('read', false)->latest()->take(5)->get();
        return view('admin.comments.index', compact('unreadComments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'tel' => 'required|string|max:20',
            'company' => 'required|string|max:255',
            'comment' => 'nullable|string',
        ]);

        // Ma'lumotni saqlash
        Comment::create($validated);

        // Response
        return redirect()->back()->with('success', 'Ma\'lumotlar muvaffaqiyatli yuborildi! Tezorada siz bilan bog\'lanamiz');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        if (!$comment->read){
            $comment->update (['read' => true]);
        }
        return view('admin.comments.show', compact('comment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $comment->delete ();
        return redirect()->route('admin.comments.index')->with('success', 'Komment muvaffaqiyatli o\'chirildi.');
    }
}
