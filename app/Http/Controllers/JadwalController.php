<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Kursi;
use App\Models\KursiDetail;
use DateTime;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedule = Jadwal::all();
        $allJadwal = Jadwal::all();
        $datetime = new DateTime();
        $next = [];
        $lowest = PHP_INT_MAX;
        foreach ($allJadwal as $jadwal) {
            $diff = $datetime->getTimestamp() - strtotime($jadwal->jadwal);
            if($diff<$lowest){
                $lowest = $diff;
                $next = $jadwal;
            }
        }

        $count = count($schedule);
        $seats = Kursi::all();


        return view('admin.jadwal',['schedules'=>$schedule,
                                    'seats'=>$seats,
                                    'next'=>$next]);
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

    public function chairDetail($id){
        // return dd(Kursi::where('id','in',KursiDetail::where('jadwal_id','=',$id)->get()));
        $msSeat = Kursi::all()->toArray();
        $details = KursiDetail::where('jadwal_id','=',$id)->get()->toArray();
        $seats = array();

        $schedule = Jadwal::find($id)->first();;

        for ($i=0; $i < sizeof($details); $i++) {
            for ($j=0; $j < sizeof($msSeat); $j++) {
                if($details[$i]['seat']==$msSeat[$j]['id']){
                    array_push($seats,[
                        'seat'=>$msSeat[$j]['seat'],
                        'status'=>$details[$i]['status']
                    ]);
                }
            }
        }

        return view('admin.kursiDetail',['seats'=>$seats,
                                        'schedule'=>$schedule]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return dd($request->toArray());
        $request->validate([
            'title'=>'required',
            'jadwal'=>'required',
        ]);

        $dataToInsert = [
            'title'=>$request->title,
            'jadwal'=>$request->jadwal,
            'description'=>$request->desc,
            'meeting_link'=>$request->link ? $request->link : 'offline'
        ];

        $jadwal = Jadwal::create($dataToInsert);

        $seats = Kursi::all();

        foreach ($seats as $seat) {
            if($request->has($seat->id)){
                KursiDetail::create([
                    'jadwal_id'=>$jadwal->id,
                    'seat'=>$seat->id,
                    'status'=>'available',
                    'description'=>'This seat is available to book',
                ]);
            }
            else{
                KursiDetail::create([
                    'jadwal_id'=>$jadwal->id,
                    'seat'=>$seat->id,
                    'status'=>'disabled',
                    'description'=>'This seat is disabled for this meeting',
                ]);
            }
        }

        return redirect('/admin/schedule')->with('success','Meeting is successfully created!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function show(Jadwal $jadwal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function edit(Jadwal $jadwal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jadwal $jadwal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Jadwal::destroy($request->scheduleId);
        return redirect('/admin/schedule');
    }
}
