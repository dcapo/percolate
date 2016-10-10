<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Bean;

class BeansController extends Controller
{
    public function index() {
        $beans = Bean::all();
        return view('beans.index', compact('beans'));
    }
}
