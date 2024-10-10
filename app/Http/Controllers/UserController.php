<?php

namespace App\Http\Controllers;

use App\Models\User; 
use Illuminate\Http\Request;

class UserController extends Controller
{
    // 1. عرض جميع المستخدمين
    public function index()
    {
        $users = User::all(); // جلب جميع المستخدمين من قاعدة البيانات
        return view('users.index', compact('users')); // عرضهم في صفحة users/index.blade.php
    }

    // 2. عرض نموذج إنشاء مستخدم جديد
    public function create()
    {
        return view('users.create'); // يعرض نموذج لإنشاء مستخدم جديد
    }

    // 3. تخزين بيانات المستخدم الجديد في قاعدة البيانات
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    // 4. عرض تفاصيل مستخدم معين
    public function show($id)
    {
        $user = User::findOrFail($id); // البحث عن المستخدم المطلوب
        return view('users.show', compact('user')); // عرض صفحة تفاصيل المستخدم
    }

    // 5. عرض نموذج تعديل مستخدم معين
    public function edit($id)
    {
        $user = User::findOrFail($id); // البحث عن المستخدم المطلوب
        return view('users.edit', compact('user')); // عرض نموذج تعديل المستخدم
    }

    // 6. تحديث بيانات المستخدم في قاعدة البيانات
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    // 7. حذف مستخدم معين
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
