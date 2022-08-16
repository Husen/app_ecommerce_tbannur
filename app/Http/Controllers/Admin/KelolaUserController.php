<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class KelolaUserController extends Controller
{
    public function index()
    {
        $data = User::all();
        return view('admins.data_user',compact('data'));
    }
}
