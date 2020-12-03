<?php

namespace App\Http\Controllers;

use App\Gps;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GpsController extends Controller
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id'=>'required',
            'lat'=>'required',
            'lon'=>'required',
            'battery'=>'required',
            'time'=>'required',
        ]);

        $user=User::findOrFail($request->user_id);
        if ($user) {
            $input = $request->all();
            $gps = Gps::create($input);
            if ($gps) {
                return response()->json([
                    'message' => 'Gps co-ordinates stored succesfully',
                    'user_id' => $gps->user_id,
                ]);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gps  $gps
     * @return \Illuminate\Http\Response
     */
    public function show(Gps $gps)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gps  $gps
     * @return \Illuminate\Http\Response
     */
    public function edit(Gps $gps)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gps  $gps
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gps $gps)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gps  $gps
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gps $gps)
    {
        //
    }
}
