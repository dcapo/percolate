<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
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

        $tasting = new Tasting;

        JavaScript::put([
            'radarMetrics' => $tasting->getRadarMetrics()
        ]);

        return view('tastings.create', compact('brews', 'users'));
    }

    public function store() {

    }

    public function edit() {

    }

    public function update() {

    }

    public function destroy(Tasting $tasting) {
        $tasting->delete();

        flash('Tasting has been deleted.')->important();
        return redirect(route('tastings.index'));
    }
}
