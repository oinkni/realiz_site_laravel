<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class MemberController extends Controller
{

    public function index(Request $request)
    {
        $query = Member::query();
        if ($request->filled('profession')) {
            $query->where('profession', 'like', '%' . $request->profession . '%');
        }
        if ($request->filled('company')) {
            $query->where('company', 'like', '%' . $request->company . '%');
        }

        if ($request->filled('order_by_field') && $request->orderByField == 'name') {
            $query->orderBy('last_name', 'desc');
            $query->orderBy('first_name', 'desc');
        } else {
            $query->orderBy('created_at', 'desc');
        }

        $members = $query->paginate(10);
        return view('members.index', compact('members'));
    }

    public function create()
    {
        return view('members.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:members',
            'profession' => 'required',
            'linkedin_profile' => 'url',
            'profile_picture_raw' => 'image',
        ]);
        $this -> saveProfilePicture($request);

        Member::create($request->all());
        return redirect()->route('members.index')->with('success', 'Member added successfully!');
    }

    public function edit($id)
    {
        $member = Member::findOrFail($id);
        return view('members.edit', compact('member'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:members,email,' . $id,
            'profession' => 'required',
            'linkedin_profile' => 'url'
        ]);
        $this -> saveProfilePicture($request);

        $member = Member::findOrFail($id);
        $member->update($request->all());
        return redirect()->route('members.index')->with('success', 'Member updated successfully!');
    }

    public function destroy($id)
    {
        $member = Member::findOrFail($id);
        Storage::disk('public')->delete($member->profile_picture);
        $member->delete();
        return redirect()->route('members.index')->with('success', 'Member deleted successfully!');
    }

    public function saveProfilePicture($request) {
        if($request->hasFile('profile_picture_raw')) {
            $file = $request->profile_picture_raw;
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('profiles', $filename, 'public');
            $request->merge(['profile_picture'=> Storage::url($path)]);
        } 
    }
}