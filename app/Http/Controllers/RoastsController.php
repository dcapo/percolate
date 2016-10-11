<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Roast;

class RoastsController extends Controller
{
    public function index() {
        $roasts = Roast::with('bean')->orderBy('updated_at', 'desc')->get();
        return view('roasts.index', compact('roasts'));
    }

    public function create() {

    }

    public function store() {

    }

    public function edit() {

    }

    public function update() {

    }

    public function destroy() {

    }
}
