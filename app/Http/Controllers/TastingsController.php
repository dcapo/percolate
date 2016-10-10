<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TastingsController extends Controller
{
    public function index() {
        return view('tastings.index');
    }
}
