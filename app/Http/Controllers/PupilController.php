<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Models\Student;
use App\Models\TransferRequest;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class PupilController extends Controller{

    public function index(){
        $studentId = Auth::id();


        $user = User::find(Auth::id());
        $studentInfo = DB::select("SELECT * FROM students WHERE user_id = '$studentId'");
        $district = $studentInfo[0]->district;

        $deo = DB::select("select name from deo where district = '$district'")[0]->name;

        return view('dashboard.pupil.index',['user'=> $user,
            'studentInfo' => $studentInfo[0],
            'deo' => $deo
        ]);
    }

    public function class(){
        $user_id = Auth::id();

        $first_name = DB::table('users')->where('user_id',Auth::id())->value('first_name');
        $second_name = DB::table('users')->where('user_id',Auth::id())->value('second_name');
        $last_name = DB::table('users')->where('user_id',Auth::id())->value('last_name');
        $full_name = $first_name.' '.$second_name.' '.$last_name;

        //results of student
        $id = DB::select("SELECT student_id from students where user_id = '$user_id'")[0]->student_id;
        $results = DB::select("select annual, terminal from c_a_s where student_id = '$id'")[0];

        $annual=$results->annual;
        $terminal=$results->terminal;


        return view('dashboard.pupil.class',['name' => $full_name,
            'annual' => json_decode($annual),
            'terminal' => json_decode($terminal),
        ]);
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
        $class = DB::table('students')->where('user_id',Auth::id())->value('_class');




        $full_name = $first_name.' '.$second_name.' '.$last_name;

        $destinationDetails = DB::select('select distinct name from regions');
        return view('dashboard.pupil.transfer_request',[
            'destinationDetails' => $destinationDetails,
            'requestStatus' => $requestStatus,
            'respondedStatus' => $respondedStatus,
            'destinationSchool' => $destinationSchool,
            'full_name' => $full_name,
            'SchoolFrom' => $schoolFrom,
            'class' => $class
        ]);
    }

    public function createRequest(Request $request){


        $validator = $request->validate([
           'region' => 'required',
           'district' => 'required',
           'school' => 'required',
           'reason' => 'required',
           'other_reason' => 'required',
        ]);

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


    public function destDistrict(Request $request){

        $name = $request -> all()['data'];
        $districts = DB::select("SELECT DISTINCT district FROM regions WHERE name ="."'$name'" );

        echo json_encode($districts);
    }


    public function destSchool(Request $request){

        $name = $request -> all()['data'];
        //$schools = DB::select("SELECT distinct school FROM regions WHERE district ="."'$name'" );
        $schools= DB::select("SELECT school_name,status FROM  schools where district ="."'$name'" );



        echo json_encode($schools);
    }

    public function passwordReset()
    {
        return view('dashboard.pupil.password_reset');

    }

    public function storeNewPassword(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => 'required',
            'new_confirm_password' => ['same:new_password'],
        ]);

        if ($validator->fails()) {
            return redirect('password_reset')
                ->withErrors($validator)
                ->withInput();
        }else{
            return redirect('pupil_dashboard');
        }

    }


}
