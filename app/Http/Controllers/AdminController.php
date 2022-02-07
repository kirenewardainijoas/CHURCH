<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\KursiDetail;
use App\Models\RFID;
use App\Models\Role;
use App\Models\Transaksi;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(Request $request){
        if($request->user()->hasRole('Admin')){
            $countSchedule = count(Jadwal::all());
            $allJadwal = Jadwal::all();

            $datetime = new DateTime();
            $nextSchedule = [];
            $lowest = PHP_INT_MAX;
            foreach ($allJadwal as $jadwal) {
                $diff = $datetime->getTimestamp() - strtotime($jadwal->jadwal);
                if($diff<$lowest){
                    $lowest = $diff;
                    $nextSchedule = $jadwal;
                }
            }

            $users = User::all()->toArray();
            $rfids = RFID::all()->toArray();

            $nR = 0;
            $nnR = 0;

            $rfidSize = sizeof($rfids);
            for($i = 0; $i < sizeof($users);$i++){
                $rfid = false;
                for ($j=0; $j < $rfidSize; $j++) {
                    if($rfids[$j]['user_id']==$users[$i]['id']){
                        $rfid = true;
                        $nR++;
                    }
                }
                if($rfid==false){
                    $nnR++;
                }
            }


            // //all transaksi log
            // $jadwal = Jadwal::orderBy('jadwal','desc')->get()->take(2);

            //take jadwal paling dekat dan minggu sebelumnya
            //paling dekat pakai next schedule
            //past schedule dengan pakai id sebelumnya terdekat (tidak bisa pakai -1)

            //past schedule (1 minggu)
            $past_sched = Jadwal::where('id','<',$nextSchedule->id)->orderBy('id','desc')->get()->first();

            $transaksi = Transaksi::all();
            $tranPerSched = array();
            $dates = array();
            $seatCount = array();
            $reservedData = array();
            $approvedData = array();
            $rejectedData = array();
            $canceledData = array();

            //push past meeting
            $reserved = count($transaksi->where('jadwal_id','=',$past_sched->id)->where('status','=','reserved'));
            array_push($reservedData,$reserved);
            $approved = count($transaksi->where('jadwal_id','=',$past_sched->id)->where('status','=','approved'));
            array_push($approvedData,$approved);
            $rejected = count($transaksi->where('jadwal_id','=',$past_sched->id)->where('status','=','rejected'));
            array_push($rejectedData,$rejected);
            $canceled = count($transaksi->where('jadwal_id','=',$past_sched->id)->where('status','=','canceled'));
            array_push($canceledData,$canceled);
            $seatPerJadwal= count(KursiDetail::where('jadwal_id','=',$past_sched->id)->where('status','=','available')->get());
            array_push($seatCount,$seatPerJadwal);
            array_push($dates,'"'.$past_sched->jadwal.'"');

            //push next schedule
            $reserved = count($transaksi->where('jadwal_id','=',$nextSchedule->id)->where('status','=','reserved'));
            array_push($reservedData,$reserved);
            $approved = count($transaksi->where('jadwal_id','=',$nextSchedule->id)->where('status','=','approved'));
            array_push($approvedData,$approved);
            $rejected = count($transaksi->where('jadwal_id','=',$nextSchedule->id)->where('status','=','rejected'));
            array_push($rejectedData,$rejected);
            $canceled = count($transaksi->where('jadwal_id','=',$nextSchedule->id)->where('status','=','canceled'));
            array_push($canceledData,$canceled);
            $seatPerJadwal= count(KursiDetail::where('jadwal_id','=',$nextSchedule->id)->where('status','=','available')->get());
            array_push($seatCount,$seatPerJadwal);
            array_push($dates,'"'.$nextSchedule->jadwal.'"');


            // foreach($jadwal as $j){
            //     $reserved = count($transaksi->where('jadwal_id','=',$j->id)->where('status','=','reserved'));
            //     array_push($reservedData,$reserved);
            //     $approved = count($transaksi->where('jadwal_id','=',$j->id)->where('status','=','approved'));
            //     array_push($approvedData,$approved);
            //     $rejected = count($transaksi->where('jadwal_id','=',$j->id)->where('status','=','rejected'));
            //     array_push($rejectedData,$rejected);
            //     $canceled = count($transaksi->where('jadwal_id','=',$j->id)->where('status','=','canceled'));
            //     array_push($canceledData,$canceled);
            //     $seatPerJadwal= count(KursiDetail::where('jadwal_id','=',$j->id)->where('status','=','available')->get());
            //     array_push($seatCount,$seatPerJadwal);
            //     array_push($dates,'"'.$j->jadwal.'"');
            // }
            // return dd($label);
            $data = [
                'registered'=>$nR,
                'notRegistered'=>$nnR,
                'countSchedule'=>$countSchedule,
                'nextSchedule'=>$nextSchedule,
                // 'graphData'=>$tranPerSched,
                'dates'=>implode(",",$dates),
                'seats'=>implode(",",$seatCount),
                'reserved'=>implode(",",$reservedData),
                'approved'=>implode(",",$approvedData),
                'rejected'=>implode(",",$rejectedData),
                'canceled'=>implode(",",$canceledData),
            ];

            return view('admin.dashboard',$data);
        }
        else redirect('/');
    }

    public function account(){
        $users = User::all()->toArray();
        $relation = DB::table('role_users')->get();
        $relation = $relation->toArray();
        $roles = Role::all()->toArray();
        $combined = array();
        for ($i=0; $i < sizeof($users); $i++) {
            for ($j=0; $j < sizeof($relation); $j++) {
                for ($k=0; $k < sizeof($roles); $k++) {
                    if($users[$i]['id']==$relation[$j]->user_id&&$relation[$j]->role_id==$roles[$k]['id']){
                        array_push($combined,[
                            'user_id'=>$users[$i]['id'],
                            'user_name'=>$users[$i]['name'],
                            'role_id'=>$relation[$j]->role_id,
                            'role_name'=>$roles[$k]['name'],
                        ]);
                    }
                }
            }
        }
        return view('admin.account',['users'=>$users,'relations'=>$relation,'roles'=>$roles,'accounts'=>$combined]);
    }

    public function changeRole(Request $request)
    {
        $role_users=DB::table('role_users')->where('user_id','=',$request->user)->update(['role_id'=>$request->role]);
        return redirect('/admin/account');
    }
}
