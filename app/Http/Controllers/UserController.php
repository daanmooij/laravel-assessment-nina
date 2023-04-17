<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return collect($users);
    }

    public function search(Request $request)
    {
        $query = User::query();
        $searchableFields = ['name', 'age', 'gender', 'location', 'religion'];
        foreach ($searchableFields as $field) {
            if ($request->has($field)) {
                $query->where($field, $request->get($field));
            }
        }
        $users = $query->get();
        return collect($users);
    }
}
