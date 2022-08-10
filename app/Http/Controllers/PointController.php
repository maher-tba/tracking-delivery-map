<?php

namespace App\Http\Controllers;

use App\Events\carTraker;
use App\Models\Point;
use App\Http\Requests\StorePointRequest;
use App\Http\Requests\UpdatePointRequest;
use Illuminate\Http\Request;

class PointController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'lat' => 'required',
            'lng' => 'required',
        ]);

        $point =  Point::create([
            'lat' => $data['lat'],
            'lng' => $data['lng'],
        ]);

        // flash a success message to the session
        session()->flash('status', 'point Created!');

        // move to new point
        $this->move($point);
        // redirect to tasks index
        return redirect('/move');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Point  $point
     * @return \Illuminate\Http\Response
     */
    public function show(Point $point)
    {
        dd($point);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Point  $point
     * @return \Illuminate\Http\Response
     */
    public function edit(Point $point)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePointRequest  $request
     * @param  \App\Models\Point  $point
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePointRequest $request, Point $point)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Point  $point
     * @return \Illuminate\Http\Response
     */
    public function destroy(Point $point)
    {
        //
    }
    public function move(Point $point)
    {
        event(new carTraker($point->lat,  $point->lng));
    }
}
