<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Bean;
use App\Http\Requests\BeanRequest;

class BeansController extends Controller
{
    public function index() {
        $beans = Bean::orderBy('updated_at', 'desc')->get();
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

    public function edit(Bean $bean) {
        return view('beans.edit', compact('bean'));
    }

    public function update(Bean $bean, BeanRequest $request) {
        $bean->update($request->all());

        flash("Bean '$bean->name' has been updated.");
        return redirect(route('beans.index'));
    }

    public function destroy(Bean $bean) {
		$name = $bean->name;
		$bean->delete();

		flash("Bean '{$bean->name}' has been deleted.");
		return redirect(route('beans.index'));
    }
}
