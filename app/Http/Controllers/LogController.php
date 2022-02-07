<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Log;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jadwals = Jadwal::all();
        $data = [
            'jadwals'=>$jadwals
        ];
        return view('admin.logs',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function detail(Request $request)
    {
        $transaksis = Transaksi::where('jadwal_id',$request->jadwal_id)->get();
        $transaksi_ids = [];
        foreach($transaksis as $transaksi){
            array_push($transaksi_ids,$transaksi->id);
        }

        $logs = Log::where('jadwal_id',$request->jadwal_id)->get();

        $logs_arr = [];
        foreach ($logs as $log) {
            $temp = [
                'user_name'=>(User::where('id',$log->user_id)->first())->name,
                'temp'=>$log->temp,
                'time'=>$log->created_at,
            ];
            array_push($logs_arr,$temp);
        }
        $data = [
            'logs'=>$logs_arr,
            'jadwals'=>Jadwal::all(),
            'specific'=>Jadwal::where('id',$request->jadwal_id)->first(),
        ];
        // return dd($logs_arr);
        return view('admin.logDetail',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function show(Log $log)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function edit(Log $log)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Log $log)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function destroy(Log $log)
    {
        //
    }
}
