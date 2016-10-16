<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\BrewRequest;
use App\Brew;
use App\BrewReading;
use App\Roast;
use App\BrewStyle;
use ApiResponse;
use Log;
use DB;
use Carbon\Carbon;

class BrewsController extends Controller
{
    public function index() {
        $brews = Brew::with('roast.bean')->orderBy('updated_at', 'desc')->get();
        return view('brews.index', compact('brews'));
    }

    public function store(BrewRequest $request) {
        $input = $request->all();
        $input['brewed_at'] = Carbon::createFromTimestamp(
            $request->input('brewed_at')
        );
        $input['average_temperature'] = Brew::calculateAverage(
            $request->input('temperatures')
        );
        $input['temperature_delta'] = Brew::calculateDelta(
            $request->input('temperatures')
        );

        try {
            DB::beginTransaction();

            $brew = Brew::create($input);
            $brew->readings()->saveMany($this->createReadings($request));

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            throw $e;
        }

        return ApiResponse::entityCreated(null);
    }

    public function edit(Brew $brew) {
        $roasts = Roast::all();
        $styles = BrewStyle::all();
        return view('brews.edit', compact('brew', 'roasts', 'styles'));
    }

    public function update(Brew $brew, BrewRequest $request) {
        $brew->update($request->all());

        flash("Brew update successful!")->important();
        return redirect(route('brews.index'));
    }

    public function destroy(Brew $brew) {
        $brew->delete();

        flash("Brew deletion successful!")->important();
        return redirect(route('brews.index'));
    }

    public function createReadings(BrewRequest $request) {
        $readings = [];
        foreach($request->input('times') as $index => $time) {
            $readings[] = new BrewReading([
                'time' => $time,
                'temperature' => $request->input('temperatures')[$index],
                'pressure' => $request->input('pressures')[$index]
            ]);
        }
        return $readings;
    }
}
