<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use App\Models\TransferRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DeoController extends Controller
{
    public function deoDashboard(){

        $deoDistrict = DB::table('deo')->where('user_id',Auth::id())->value('district');

        //Head Teachers count depend upon the deo region
        $headTeachers = DB::select('SELECT * FROM head_masters WHERE district ='."'$deoDistrict'");

        //Schools count depend upon the deo region
        $schools = DB::select('SELECT * FROM schools WHERE district ='."'$deoDistrict'");


        $deoDetails = DB::select("SELECT * FROM deo WHERE user_id =".Auth::id());


        return view('dashboard.deo.deo',['deoDetails' => $deoDetails[0],
            'headMasters' => count($headTeachers),
            'schools' => count($schools)
        ]);
    }

    public function pendingTransfer(){

        //selecting transfer request depending upon the deo district.
        $district = DB::select('SELECT district FROM deo where user_id ='.Auth::id());
        $regionFrom = $district[0]-> district;
        $transferReq = DB::select("SELECT * FROM transfer where districtFrom ="."'$regionFrom' AND HT_status = 'approved'");
        //SELECT * FROM transfer where districtFrom = 'Dodoma Municipal' AND HT_status = 'approved'


        return view('dashboard.deo.pending_transfer',[
            'transferRequest' => $transferReq,
            'thereIsTransfer' => count($transferReq)
        ]);
    }


    public function status(Request $request){

        $action=$request->all()['input'];
        $message=$request->all()['message'];
        $id=$request->all()['id'];
        DB::update("update transfer set DEO_status= '$action' where transfer_id='$id'");
         echo json_encode([
            'action'=>$action,
            'message'=>$message,
             'id'=>$id
         ]);


    }

    public function load_status(Request $request):void
    {
         $id=$request->all()['id'];
        $data=DB::select("select DEO_status from transfer");

        echo json_encode($data);
    }


    public function changePassword(){
        return view('dashboard.deo.change_password');
    }

    public function storeNewPassword(Request $request){

        $validator = Validator::make($request->all(), [
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => 'required',
            'new_confirm_password' => ['same:new_password'],
        ]);

        if ($validator->fails()) {
            return redirect('deo_password_reset')
                ->withErrors($validator)
                ->withInput();
        }else{
            return redirect('deo_dashboard');
        }

    }





}
