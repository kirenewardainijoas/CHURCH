<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Kursi;
use App\Models\Transaksi;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UmatController extends Controller
{
    public function index(Request $request){
        if($request->user()->hasRole('Umat')){
            $userTransaksi = Transaksi::where('user_id','=',Auth::user()->id)->where('status','!=','canceled')->orderBy('reservation_date','desc')->get()->first();
            if($userTransaksi){
                $resv_date = new DateTime($userTransaksi->reservation_date);
                $now_date = new DateTime('now');
                //return dd(date_diff($now_date,$resv_date,FALSE));
                if(date_diff($now_date,$resv_date)->invert==0){
                    $jadwal = Jadwal::where('id','=',$userTransaksi->jadwal_id)->get()->first();
                    $seat = Kursi::where('id','=',$userTransaksi->seat)->get()->first();
                    $next = [
                        'topic'=>$jadwal->title,
                        'date'=>$userTransaksi->reservation_date,
                        'seat'=>$seat->seat,
                        'link'=>$jadwal->meeting_link,

                    ];
                    $data = [
                        'next'=>$next,
                    ];
                    // return dd($next);
                    return view('umat.umat',$data);
                }
                else{
                    $data = [
                        'next'=>null,
                    ];
                    // return dd($next);
                    return view('umat.umat',$data);

                }
            }
            else{
                $data = [
                    'next'=>null,
                ];
                // return dd($next);
                return view('umat.umat',$data);

            }
        }
        else redirect('/');
    }


}
