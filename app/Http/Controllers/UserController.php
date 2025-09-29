<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Type;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with(['type', 'categories'])->where('is_admin', 0)->paginate(10);
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $types = Type::all();
        $categories = Category::all();
        return view('users.create', compact('types', 'categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:6',
            'type_id'  => 'nullable|exists:types,id',
            'categories' => 'array',
        ]);

        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);

        if ($request->has('categories')) {
            $user->categories()->sync($request->categories);
        }

        return redirect()->route('users')->with('success', 'User created successfully.');
    }

    public function edit($id)
    {
        $user = User::with('categories')->findOrFail($id);
        $types = Type::all();
        $categories = Category::all();
        return view('users.edit', compact('user','types','categories'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $data = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email,'.$id,
            'type_id'  => 'nullable|exists:types,id',
            'categories' => 'array',
        ]);

        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        $user->categories()->sync($request->categories ?? []);

        return redirect()->route('users')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->categories()->detach();
        $user->delete();

        return redirect()->route('users')->with('success', 'User deleted successfully.');
    }

    public function getByType($type_id)
    {
        $categories = Category::where('type_id', $type_id)->get();

        return response()->json($categories);
    }

}

