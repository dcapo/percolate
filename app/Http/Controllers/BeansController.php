<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Bean;
use App\Http\Requests\BeanRequest;

class BeansController extends Controller
{
    public function index() {
        $beans = Bean::all();
        return view('beans.index', compact('beans'));
    }

    public function create() {
        return view('beans.create');
    }

    public function store(BeanRequest $request) {
        $bean = Bean::create($request->all());

        flash("New bean '$bean->name' has been created.");
        return redirect(route('beans.index'));
    }

    public function edit() {

    }

    public function update() {

    }

    public function destroy(Bean $bean) {
		$name = $bean->name;
		$bean->delete();

		flash("Bean '{$bean->name}' has been deleted.");
		return redirect(route('beans.index'));
    }
}
