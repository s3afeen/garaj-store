<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::all();
        return view('admins.index', compact('admins'));
    }

    public function create()
    {
        return view('admins.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required',
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);
        Admin::create($validatedData);
        return redirect()->route('admins.index')->with('success', 'Admin created successfully.');
    }

    public function show($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admins.show', compact('admin'));
    }

    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admins.edit', compact('admin'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins,email,' . $id,
        ]);

        $admin = Admin::findOrFail($id);
        $admin->update($validatedData);
        return redirect()->route('admins.index')->with('success', 'Admin updated successfully.');
    }

    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();
        return redirect()->route('admins.index')->with('success', 'Admin deleted successfully.');
    }
}
