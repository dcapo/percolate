<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\RoastRequest;
use App\Roast;
use App\Bean;

class RoastsController extends Controller
{
    public function index() {
        $roasts = Roast::with('bean')->orderBy('updated_at', 'desc')->get();
        return view('roasts.index', compact('roasts'));
    }

    public function create() {
        $beans = Bean::all();
        return view('roasts.create', compact('beans'));
    }

    public function store(RoastRequest $request) {
        $roast = Roast::create($request->all());

        flash("Roast on {$roast->roasted_at} has been created.")->important();
        return redirect(route('roasts.index'));
    }

    public function edit(Roast $roast) {
        $beans = Bean::all();
        return view('roasts.edit', compact('roast', 'beans'));
    }

    public function update(Roast $roast, RoastRequest $request) {
        $roast->update($request->all());

        flash("Roast on {$roast->roasted_at} has been updated.")->important();
        return redirect(route('roasts.index'));
    }

    public function destroy(Roast $roast) {
		$roastedAt = $roast->roasted_at;
		$roast->delete();

		flash("The roast on '{$roastedAt}' has been deleted.")->important();
		return redirect(route('roasts.index'));
    }
}
