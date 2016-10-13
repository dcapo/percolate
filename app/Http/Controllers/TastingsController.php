<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\TastingRequest;
use App\Tasting;
use App\Brew;
use DB;
use JavaScript;

class TastingsController extends Controller
{
    public function index() {
        $tastings = Tasting::with('brew.roast.bean', 'brew.style')
            ->orderBy('updated_at', 'desc')
            ->get();
        return view('tastings.index', compact('tastings'));
    }

    public function create() {
        $brews = Brew::with('roast.bean', 'style')->get();
        $users = DB::table('users')->pluck('name', 'id');

        JavaScript::put([
            'radarMetrics' => (new Tasting)->getRadarMetrics()
        ]);

        return view('tastings.create', compact('brews', 'users'));
    }

    public function store(TastingRequest $request) {
        $tasting = Tasting::create($request->all());

        flash("Tasting for {$tasting->user->name} on {$tasting->tasted_at}
               has been created.");
        return redirect(route('tastings.index'));
    }

    public function edit(Tasting $tasting) {
        $brews = Brew::with('roast.bean', 'style')->get();
        $users = DB::table('users')->pluck('name', 'id');

        JavaScript::put([
            'radarMetrics' => $tasting->getRadarMetrics()
        ]);

        return view('tastings.edit', compact('tasting', 'brews', 'users'));
    }

    public function update(Tasting $tasting, TastingRequest $request) {
        $tasting->update($request->all());

        flash("Tasting for {$tasting->user->name} on {$tasting->tasted_at}
               has been updated.");
        return redirect(route('tastings.index'));
    }

    public function destroy(Tasting $tasting) {
        $tasting->delete();

        flash('Tasting has been deleted.')->important();
        return redirect(route('tastings.index'));
    }
}
