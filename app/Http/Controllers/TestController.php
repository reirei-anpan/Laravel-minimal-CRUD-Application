<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class TestController extends Controller
{
    public function index()
    {
        $products = User::all();
        return view('test', ['products' => $products]);
    }
}
