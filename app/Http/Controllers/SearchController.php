<?php

namespace App\Http\Controllers;

use App\Models\UserDetail;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search()
    {
        $users = UserDetail::all();
        return view('search', compact('users')); 
    }
}
