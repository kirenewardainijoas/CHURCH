<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Kursi;
use App\Models\KursiDetail;
use App\Models\Log;
use App\Models\RFID;
use App\Models\Transaksi;
use App\Models\User;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $rfid = count(RFID::where('user_id','=',Auth::user()->id)->get()) > 0 ? true:false;
        $schedules = Jadwal::orderBy('jadwal','desc')->get();
        $seat = Kursi::all()->toArray();
        $jadwal = $schedules->toArray();
        $passed = array();
        $datetime = new DateTime();
        $allTransaksi = Transaksi::all()->toArray();
        $userTransaksi = array();
        for ($i=0; $i < sizeof($allTransaksi); $i++) {
            $date = '';
            $title = '';
            $seat_name = '';
            $status = $allTransaksi[$i]['status'];
            if(Auth::user()->id==$allTransaksi[$i]['user_id']){
                $date = $allTransaksi[$i]['reservation_date'];
                // array_push($userTransaksi,$temp);
            }
            for ($j=0; $j < sizeof($jadwal); $j++) {
                if($allTransaksi[$i]['jadwal_id']==$jadwal[$j]['id']){
                    $title = $jadwal[$j]['title'];
                }
            }
            for ($j=0; $j < sizeof($seat); $j++) {
                if($seat[$j]['id']==$allTransaksi[$i]['seat']){
                    $seat_name = $seat[$j]['seat'];
                }
            }
            $temp = [
                'id'=>$allTransaksi[$i]['id'],
                'reservation_date'=>$date,
                'title'=>$title,
                'seat'=>$seat_name,
                'status'=>$status
            ];
            array_push($userTransaksi,$temp);
        }
        // return dd($userTransaksi);
        for ($i=0; $i < sizeof($schedules); $i++) {
            if(strtotime($schedules[$i]['jadwal'])<$datetime->getTimestamp()){
                array_push($passed,$schedules[$i]);
            }
        }
        return view('umat.reservation',['schedules'=>$schedules,'bookeds'=>$userTransaksi,'passed'=>$passed,'rfid'=>$rfid]);
    }

    public function book(Request $request)
    {
        $sameTransaksi = Transaksi::where('jadwal_id',$request->scheduleId)->where('user_id',Auth::user()->id)->get();
        //kalau ada jadwal dan orang yang sama maka gabole pesan lagi

        if(count($sameTransaksi)>0){
            return redirect('/umat/reservation')->with('success','User cannot register on the same schedule!');
        }


        $jadwal = Jadwal::where('id','=',$request->scheduleId)->get()->first();
        // return dd($jadwal->jadwal);
        $transaksi = Transaksi::create([
            'user_id'=>Auth::user()->id,
            'jadwal_id'=>$request->scheduleId,
            'reservation_date'=>$jadwal->jadwal,
            'seat'=>$request->seat,
            'status'=>'reserved', //reserved (sudah dipesan, kursi disabled) , canceled (tercancel karena sesuatu, kursi bisa dipesan orang lain)
            'description'=>'User reserved'
        ]);

        return redirect('/umat/reservation')->with('success','Created reservation on meeting '.$jadwal->title.' on '.$jadwal->jadwal);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $jadwal = Jadwal::where('id','=',$request->scheduleId)->get()->first();
        $kursiDetail = KursiDetail::where('jadwal_id','=',$request->scheduleId)->get();
        $kursiDetail = $kursiDetail->toArray();
        $transaksi = Transaksi::where('jadwal_id','=',$request->scheduleId)->get();
        $transaksi = $transaksi->toArray();
        $seat = Kursi::all()->toArray();

        $kursi = array();

        for ($i=0; $i < sizeof($kursiDetail); $i++) {
            $seatName = '';
            for ($j=0; $j < sizeof($seat); $j++) {
                if($seat[$j]['id']==$kursiDetail[$i]['seat']){
                    $seatName = $seat[$j]['seat'];
                }
            }

            $status = true;
            if($kursiDetail[$i]['status']=='disabled'){
                $status = false;
            }
            else{
                for ($j=0; $j < sizeof($transaksi); $j++) {
                    if($transaksi[$j]['seat']==$kursiDetail[$i]['seat']&&$transaksi[$j]['status']!='canceled'){
                        $status = false;
                    }
                }
            }

            $temp = [
                'seat_id'=>$kursiDetail[$i]['seat'],
                'seat_name'=>$seatName,
                'status'=>$status,
            ];
            array_push($kursi,$temp);
        }


        // return dd($kursi);
        return view('umat.reservationSeat',['schedule'=>$jadwal,'seats'=>$kursi]);
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
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }


    public function cancel(Request $request)
    {
        $transaksi = Transaksi::where('id','=',$request->bookId)->get()->first();
        $jadwal = Jadwal::where('id','=',$transaksi->jadwal_id)->get()->first();
        $seat = Kursi::where('id','=',$transaksi->seat)->get()->first();
        return view('umat.reservationCancel',['detail'=>$transaksi,'jadwal'=>$jadwal,'seat'=>$seat]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $transaksi = Transaksi::where('id','=',$id)->get()->first();
        $jadwal = Jadwal::where('id','=',$transaksi->jadwal_id)->get()->first();
        $seat = Kursi::where('id','=',$transaksi->seat)->get()->first();
        $allSeat = Kursi::all();
        return view('umat.reservationDetail',['detail'=>$transaksi,'jadwal'=>$jadwal,'seat'=>$seat,'allSeats'=>$allSeat]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $transaksi = DB::table('transaksis')->where('id','=',$request->bookId)->update(['status'=>'canceled','description'=>'Canceled by user']);
        return redirect('/umat/reservation')->with('success','Booking has been canceled');
    }



    public function apiChair($seat){
        $kursi = Kursi::where('seat','=',$seat)->get()->first();
        $jadwals = Jadwal::all();
        $nearest = false;
        $smallest = PHP_INT_MAX;
        $jadwal = Jadwal::orderBy('jadwal','asc')->get()->first();
        foreach ($jadwals as $j ) {
            $date = new DateTime('now',new DateTimeZone(config('app.timezone')));
            $now = $date->getTimestamp();
            $converted = strtotime($j->jadwal);
            $datediff = $now - $converted;
            if($datediff<$smallest){
                $smallest = $datediff;
                $jadwal = $j;
            }
        }


        // return dd($jadwal->id);
        $kursiDetail = KursiDetail::where('jadwal_id','=',$jadwal->id)->where('seat','=',$kursi->id)->get()->first();
        $transaksi = Transaksi::where('seat','=',$kursi->id)->where('jadwal_id',$jadwal->id)->get()->first();
        if($transaksi){
            $user = User::where('id','=',$transaksi->user_id)->get()->first();
            $name = '';
            $status = 'available'; //available, reserved, disabled
            if($kursiDetail->status == 'disabled')$status = 'disabled';
            if($transaksi->status == 'reserved'){
                $name = $user->name;
                $status = 'reserved';
            }
            if($transaksi->status == 'accepted'){
                $name = $user->name;
                $status = 'disabled';
            }
            $data = [
                'jadwal'=>$jadwal->jadwal,
                'status'=>$status,
                'name'=>$name
            ];
            return $data;
        }
        else{
            $data = [
                'jadwal'=>'No Schedule',
                'status'=>'available',
                'name'=>false,
            ];
            return $data;
        }

    }

    public function apiRegist($UID,$status,$temp){
        $rfid = RFID::where('UID',$UID)->get()->first();
        if($rfid){
            $user = User::where('id','=',$rfid->user_id)->get()->first();
            $datetime = new DateTime('now');
            $allJadwal = Jadwal::all();
            $nextJadwal = [];
            $lowest = PHP_INT_MAX;
            if(count($allJadwal)>0){
                foreach($allJadwal as $jdwl){
                    $datediff = $datetime->getTimestamp()-strtotime($jdwl->jadwal);
                    if($datediff<$lowest){
                        $lowest = $datediff;
                        $nextJadwal = $jdwl;
                    }
                }

                $transaksi = Transaksi::where('user_id','=',$rfid->user_id)->where('jadwal_id','=',$nextJadwal->id)->get()->first();

                if($status=='accepted'){
                    if($transaksi){
                        Transaksi::where('user_id','=',$rfid->user_id)->where('jadwal_id','=',$nextJadwal->id)->update([
                            'status'=>'accepted'
                        ]);

                        // return dd( Transaksi::where('user_id','=',$rfid->user_id)->where('jadwal_id','=',$nextJadwal->id)->get());

                        //create log
                        Log::create([
                            'user_id'=>$rfid->user_id,
                            'jadwal_id'=>$nextJadwal->id,
                            'transaksi_id'=>$transaksi->id,
                            'temp'=>$temp,
                        ]);

                        return [
                            'name'=>$user->name,
                            'status'=>'accepted'
                        ] ;
                    }
                    else{
                        return [
                            'status'=>'No Schedule',
                        ];
                    }
                }
                else if($status=='rejected'){
                    if($transaksi){
                        Transaksi::where('user_id','=',$rfid->user_id)->where('jadwal_id','=',$nextJadwal->id)->update([
                            'status'=>'rejected'
                        ]);
                        return [
                            'name'=>$user->name,
                            'status'=>'rejected'
                        ] ;
                    }
                    else{
                        return [
                            'name'=>$user->name,
                            'status'=>'No Schedule'
                        ] ;
                    }
                }
            }
            else{
                return ['status'=>'No Schedule'];
            }

        }
        else{
            return ['status'=>'User not found'];
        }
    }
}
