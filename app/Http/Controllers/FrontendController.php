<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $types = Type::all();
        $users = User::with('type')->where('is_admin', 0)->get(); // eager load type relation
        return view('home', compact('types', 'users'));
    }

    // AJAX filter method
    public function filterByType(Request $request)
    {
        $typeId = $request->type_id;

        $users = User::with('type')
                    ->where('is_admin', 0) // only normal users
                    ->when($typeId, function ($query) use ($typeId) {
                        $query->where('type_id', $typeId);
                    })
                    ->get();

        return response()->json($users);
    }
}
