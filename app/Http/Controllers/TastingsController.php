<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\TastingRequest;
use App\Tasting;
use App\Brew;
use App\Flavor;
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
        $brews = Brew::with('roast.bean', 'style')->orderBy('brewed_at', 'desc')->get();
        $users = DB::table('users')->pluck('name', 'id');

        $flavorWheel = file_get_contents(__DIR__ .
            './../../../public/json/flavor_wheel.json');

        JavaScript::put([
            'radarMetrics' => (new Tasting)->getRadarMetrics(),
            'flavors' => [],
            'flavorWheel' => json_decode($flavorWheel)
        ]);

        return view('tastings.create', compact('brews', 'users'));
    }

    public function store(TastingRequest $request) {
        try {
            DB::beginTransaction();

            $tasting = Tasting::create($request->all());
            $tasting->flavors()->saveMany($this->createFlavors($request));

            DB::commit();

        } catch (Exception $e) {
            DB::rollback();
            throw $e;
        }

        flash("Tasting for {$tasting->user->name} on {$tasting->tasted_at}
               has been created.");
        return redirect(route('tastings.index'));
    }

    public function edit(Tasting $tasting) {
        $brews = Brew::with('roast.bean', 'style')->get();
        $users = DB::table('users')->pluck('name', 'id');

        $flavorWheel = file_get_contents(__DIR__ .
            './../../../public/json/flavor_wheel.json');

        JavaScript::put([
            'radarMetrics' => $tasting->getRadarMetrics(),
            'flavors' => $tasting->flavors->pluck('name')->all(),
            'flavorWheel' => json_decode($flavorWheel)
        ]);

        return view('tastings.edit', compact('tasting', 'brews', 'users'));
    }

    public function update(Tasting $tasting, TastingRequest $request) {
        try {
            DB::beginTransaction();

            $tasting->flavors()->delete();
            $tasting->flavors()->saveMany($this->createFlavors($request));
            $tasting->update($request->all());

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
        }

        flash("Tasting for {$tasting->user->name} on {$tasting->tasted_at}
               has been updated.");
        return redirect(route('tastings.index'));
    }

    public function destroy(Tasting $tasting) {
        $tasting->delete();

        flash('Tasting has been deleted.')->important();
        return redirect(route('tastings.index'));
    }

    public function createFlavors(TastingRequest $request) {
		$flavors = [];
		foreach($request->input('flavors') as $index => $name) {
            $flavors[] = new Flavor(compact('name'));

		}
		return $flavors;
    }
}
