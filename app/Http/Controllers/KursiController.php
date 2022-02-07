<?php

namespace App\Http\Controllers;

use App\Models\Kursi;
use Illuminate\Http\Request;

class KursiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seats = Kursi::all();
        $totalCount = count($seats);
        $data = [   'seats'=>$seats,
                    'totalCount'=>$totalCount];
        return view('admin.seat',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            'seat'=>'required|unique:kursis,seat'
        ]);

        $data = $request->all();

        $kursi = Kursi::create($data);

        return back()->with('success','Seat added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kursi  $kursi
     * @return \Illuminate\Http\Response
     */
    public function show(Kursi $kursi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kursi  $kursi
     * @return \Illuminate\Http\Response
     */
    public function edit(Kursi $kursi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kursi  $kursi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kursi $kursi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kursi  $kursi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kursi $kursi,Request $request)
    {
        $kursi->destroy($request->seatId);
        return redirect('/admin/seat')->with('success','Seat '.$request->seatId.' deleted successfully!');
    }

    public function removeConfirm($id){

        return view('admin.seatRemove',['seat'=>Kursi::find($id)]);
    }
}
