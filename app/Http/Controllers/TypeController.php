<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::all();

        return view('types.index', compact('types'));
    }

    public function create()
    {
        return view('types.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('types', 'public');
        }

        Type::create($data);

        return redirect()->route('types')->with('success', 'Type created successfully.');
    }

    public function edit($id)
    {
        $type = Type::findOrFail($id);
        return view('types.edit', compact('type'));
    }

    public function update(Request $request, $id)
    {
        
        $type = Type::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($type->image) {
                Storage::disk('public')->delete($type->image);
            }
            $data['image'] = $request->file('image')->store('types', 'public');
        }

        $type->update($data);

        return redirect()->route('types')->with('success', 'Type updated successfully.');
    }

    public function destroy($id)
    {
        $type = Type::findOrFail($id);

        if ($type->image) {
            Storage::disk('public')->delete($type->image);
        }

        $type->delete();

        return redirect()->route('types')->with('success', 'Type deleted successfully.');
    }

}
