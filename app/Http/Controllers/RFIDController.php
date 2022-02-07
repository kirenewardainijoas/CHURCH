<?php

namespace App\Http\Controllers;

use App\Models\RFID;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class RFIDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all()->toArray();
        $rfids = RFID::all()->toArray();

        $combined = array();
        $registered = 0;
        $notRegistered = 0;

        $rfidSize = sizeof($rfids);
        for($i = 0; $i < sizeof($users);$i++){
            $rfid = false;
            for ($j=0; $j < $rfidSize; $j++) {
                if($rfids[$j]['user_id']==$users[$i]['id']){
                    $rfid = true;
                    $registered++;
                }
            }
            $temp = [
                'user_id'=>$users[$i]['id'],
                'user_name'=>$users[$i]['name'],
                'rfid'=>$rfid,
            ];
            array_push($combined,$temp);
            if($rfid==false){
                $notRegistered++;
            }
        }

        // return dd($combined);
        return view('admin.rfid',[
            'registered'=>$registered,
            'notRegistered'=>$notRegistered,
            'combined'=>$combined
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($user_id)
    {
        $user = User::find($user_id);
        return view('admin.rfidRecord',['user'=>$user]);
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
            'rfid_uid'=>'required|unique:r_f_i_d_s,UID'
        ]);

        $rfid = RFID::create([
            'user_id'=>$request->user_id,
            'UID'=>$request->rfid_uid
        ]);

        if($rfid)return redirect('/admin/rfid')->with('success','New user is registered!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RFID  $rFID
     * @return \Illuminate\Http\Response
     */
    public function show(RFID $rFID)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RFID  $rFID
     * @return \Illuminate\Http\Response
     */
    public function edit($user_id)
    {
        $user = User::find($user_id);
        return view('admin.rfidUpdate',['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RFID  $rFID
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {   $rfid = DB::table('r_f_i_d_s')->where('user_id','=',$request->user_id)->update(['UID'=>$request->rfid_uid]);

        return redirect('/admin/rfid')->with('success','Card successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RFID  $rFID
     * @return \Illuminate\Http\Response
     */
    public function destroy(RFID $rFID)
    {
        //
    }
}
