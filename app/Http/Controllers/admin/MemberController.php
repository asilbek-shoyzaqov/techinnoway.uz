<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Member::orderBy('created_at', 'desc')->get();
        return view('admin.members.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.members.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'gender' => 'required|in:erkak,ayol',
            'birthdate' => 'required|date',
            'region' => 'required|string|max:255',
            'login' => 'required|string|max:255|unique:members',
            'password' => 'required|string|min:8',
            'status' => 'required|in:active,inactive',
        ]);

        Member::create([
            'fullname' => $request->fullname,
            'gender' => $request->gender,
            'birthdate' => $request->birthdate,
            'region' => $request->region,
            'login' => $request->login,
            'password' => bcrypt($request->password),
            'status' => $request->status,
        ]);

        return redirect ()->route('admin.members.index')->with ('success', 'Foydalanuvchi muvaffaqiyatli yaratildi');
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $member = Member::findOrFail($id);
        return view('admin.members.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'gender' => 'required|in:erkak,ayol',
            'birthdate' => 'required|date',
            'region' => 'required|string|max:255',
            'login' => 'required|string|max:255',
            'password' => 'required|string|min:8',
            'status' => 'required|in:active,inactive',
        ]);

        $member = Member::findOrFail($id);
        $member->fullname = $request->input('fullname');
        $member->gender = $request->input('gender');
        $member->birthdate = $request->input('birthdate');
        $member->region = $request->input('region');
        $member->login = $request->input('login');

        // Parolni faqat agar u kiritilgan bo'lsa yangilash
        if ($request->filled('password')) {
            $member->password = Hash::make($request->input('password'));
        }

        $member->status = $request->input('status');
        $member->save();

        return redirect()->route('admin.members.index')->with('success', 'Foydalanuvchi muvaffaqiyatli yangilandi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        $member->delete();
        return redirect ()->route ('admin.members.index')->with ('success', 'Foydalanuvchi muvaffaqiyatli o\'chirildi');
    }
}
