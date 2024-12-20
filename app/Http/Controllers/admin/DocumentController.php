<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $documents = Document::all();
        return view('admin.documents.index', compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.documents.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pdf' => 'nullable|mimes:pdf|max:2048',
            'img' => 'nullable|mimes:jpeg,jpg,png|max:2048',
        ]);

        $documentData = [];

        if ($request->hasFile('pdf')) {
            $pdfName = time() . '_' . $request->file('pdf')->getClientOriginalName();
            $documentData['pdf'] = $request->file('pdf')->storeAs('pdfs', $pdfName, 'public');
        }

        if ($request->hasFile('img')) {
            $imgName = time() . '_' . $request->file('img')->getClientOriginalName();
            $documentData['img'] = $request->file('img')->storeAs('images', $imgName, 'public');
        }

        Document::create($documentData);
        return redirect()->route('admin.documents.index')->with('success', 'Document muvaffaqiyatli qo\'shildi.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Document $document)
    {
        return view('admin.documents.edit', compact('document'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Document $document)
    {
        $request->validate([
            'pdf' => 'nullable|mimes:pdf|max:2048',
            'img' => 'nullable|mimes:jpeg,jpg,png|max:2048',
        ]);

        if ($request->hasFile('pdf')) {
            if ($document->pdf) {
                Storage::disk('public')->delete($document->pdf);
            }
            $pdfName = time() . '_' . $request->file('pdf')->getClientOriginalName();
            $document->pdf = $request->file('pdf')->storeAs('pdfs', $pdfName, 'public');
        }

        if ($request->hasFile('img')) {
            if ($document->img) {
                Storage::disk('public')->delete($document->img);
            }
            $imgName = time() . '_' . $request->file('img')->getClientOriginalName();
            $document->img = $request->file('img')->storeAs('images', $imgName, 'public');
        }

        $document->save();
        return redirect()->route('admin.documents.index')->with('success', 'Document muvaffaqiyatli yangilandi.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Document $document)
    {
        if ($document->pdf) {
            Storage::disk('public')->delete($document->pdf);
        }

        if ($document->img) {
            Storage::disk('public')->delete($document->img);
        }

        $document->delete();
        return redirect()->route('admin.documents.index')->with('success', 'Document muvaffaqiyatli o\'chirildi.');
    }

}
