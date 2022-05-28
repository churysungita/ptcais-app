<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Models\Student;
use App\Models\TransferRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class PupilController extends Controller{

    public function index(){
        $user = User::find(Auth::id());
        $pupilInfo = Student::where('user_id',Auth::id())->get();
        return view('dashboard.pupil.index',['user'=> $user]);
    }

    public function class(){

        $first_name = DB::table('users')->where('user_id',Auth::id())->value('first_name');
        $second_name = DB::table('users')->where('user_id',Auth::id())->value('second_name');
        $last_name = DB::table('users')->where('user_id',Auth::id())->value('last_name');

        $full_name = $first_name.' '.$second_name.' '.$last_name;

        return view('dashboard.pupil.class',['name' => $full_name]);
    }

    public function pupilTransfer(){

        $studentId = DB::table('students')->where('user_id', Auth::id())->value('student_id');
        $requestStatus = DB::table('transfer')->where('student_id',$studentId)->value('student_id');
        $respondedStatus = DB::table('transfer')->where('student_id',$studentId)->value('DEO_status');


        $destinationSchool = DB::table('transfer')->where('student_id',$studentId)->value('schoolTo');
        $schoolFrom = DB::table('transfer')->where('student_id',$studentId)->value('schoolFrom');
        $first_name = DB::table('transfer')->where('student_id',$studentId)->value('first_name');
        $second_name = DB::table('transfer')->where('student_id',$studentId)->value('second_name');
        $last_name = DB::table('transfer')->where('student_id',$studentId)->value('last_name');

        $full_name = $first_name.' '.$second_name.' '.$last_name;

        $destinationDetails = DB::select('select distinct name from regions');
        return view('dashboard.pupil.transfer_request',[
            'destinationDetails' => $destinationDetails,
            'requestStatus' => $requestStatus,
            'respondedStatus' => $respondedStatus,
            'destinationSchool' => $destinationSchool,
            'full_name' => $full_name,
            'SchoolFrom' => $schoolFrom
        ]);
    }

    public function createRequest(Request $request){

        $pupil = DB::select('select * from students where student_id = '.Auth::id());
        $user = DB::select('select * from users where user_id = '.Auth::id());


        $requestTransfer = new TransferRequest();
        $requestTransfer -> student_id = DB::table('students')->where('user_id', Auth::id())->value('student_id');
        $requestTransfer -> first_name = $user[0]->first_name;
        $requestTransfer -> second_name = $user[0]->second_name;
        $requestTransfer -> last_name = $user[0]->last_name;
        $requestTransfer -> age = DB::table('students')->where('user_id', Auth::id())->value('age');
        $requestTransfer -> gender = DB::table('students')->where('user_id', Auth::id())->value('gender');
        $requestTransfer -> regionFrom = DB::table('students')->where('user_id', Auth::id())->value('region');
        $requestTransfer -> districtFrom = DB::table('students')->where('user_id', Auth::id())->value('district');
        $requestTransfer -> schoolFrom = DB::table('students')->where('user_id', Auth::id())->value('school_name');
        //destination
        $requestTransfer -> regionTo =  $request->input('region');
        $requestTransfer -> districtTo =  $request->input('district');
        $requestTransfer -> schoolTo =  $request->input('school');
        $requestTransfer -> reason =  $request->input('reason');
        $requestTransfer -> more_reason =  $request->input('other_reason');

        $requestTransfer -> save();

        return redirect('pupil_transfer');
    }




}
