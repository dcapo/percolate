<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class RoastsController extends Controller
{
    public function index() {
        return view('roasts.index');
    }
}
