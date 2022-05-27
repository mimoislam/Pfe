<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class IndexController extends Controller
{
    public function index(){
        $users = User::all();
        return view('admin.index', compact('users'));
    }
}
