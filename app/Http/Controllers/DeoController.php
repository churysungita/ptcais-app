<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransferRequest;
use Illuminate\Support\Facades\DB;

class DeoController extends Controller
{
    public function deoDashboard(){
        return view('dashboard.deo.deo');
    }

    public function pendingTransfer(){
        $transferReq = TransferRequest::all();
        return view('dashboard.deo.pending_transfer',['transferRequest' => $transferReq]);
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



}
