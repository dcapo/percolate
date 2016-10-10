<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class BeansController extends Controller
{
    public function index() {
        return view('beans.index');
    }
}
