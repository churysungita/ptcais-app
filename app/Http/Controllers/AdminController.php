<?php

namespace App\Http\Controllers;

use App\Models\HeadMaster;
use App\Models\Region;
use App\Models\SchoolModel;
use App\Models\User;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use App\Models\DeoModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function adminDashboard(){
        $deos = DB::select('select * from deo');
        $head_teacher = DB::select('select * from head_masters');
        $schools = DB::select('select * from schools');

        return view('dashboard.admin.admin',[
            'deoCount' => count($deos),
            'headteacherCount' => count($head_teacher),
            'schools' => count($schools)
        ]);
    }


    public function manageRegions(){
        return view('dashboard.admin.manage_regions');
    }

    public function manageSchools(){
        $schools = new SchoolModel();
        return view('dashboard.admin.manage_schools',['schools' => $schools -> all()]);
    }




    public function createSchool(){

        $regions = DB::select("SELECT DISTINCT name FROM regions" );
        return view('dashboard.admin.create_school',[
            'regions' => $regions
        ]);
    }


    public function districts(Request $request){

         $name = $request -> all()['data'];
         $districts = DB::select("SELECT DISTINCT district FROM regions WHERE name ="."'$name'" );

         echo json_encode($districts);
    }


    public function getSchools(Request $request){
         $name = $request -> all()['data'];
         $schools= DB::select("SELECT school_name FROM  schools where district ="."'$name'" );

         echo json_encode($schools);
    }



     public function storeSchool(Request $request){

            //Input validation


            $school = new SchoolModel();
            $school -> registration_number = $request -> input('reg_number');
            $school -> school_name = $request -> input('school_name');
            $school -> region = $request -> input('region_name');
            $school -> district = $request -> input('district_name');
            $school -> status = $request -> input('school_status');
            $school -> save();

            //inserting the school information into region table
            $region = new Region();
            $region -> name  = $request -> input('region_name');
            $region -> district  =  $request -> input('district_name');
            $region -> school = $request -> input('school_name');
            $region -> save();

            return redirect('manage_schools');
        }


    public function manageDeos(){
        $deoDetails = new DeoModel();
        return view('dashboard.admin.deo_details',['deoDetails' => $deoDetails ->all()]);

    }

    public function createHeadTeacher(){


        $regions = DB::select('SELECT DISTINCT name FROM regions');


        return view('dashboard.admin.create_head_teacher',[
            'regions' => $regions
        ]);

    }


    public function createDeo(){

        $regions = DB::select('SELECT DISTINCT name FROM regions');

        return view('dashboard.admin.create_deo',[
            'regions' => $regions
        ]);
    }

     public function storeDeo(Request $request){

         // 1. validating the user inputs.


         //create user in user table
         $user = new User();
         $user->first_name = trim($request->input('first_name'));
         $user->second_name = trim($request->input('second_name'));
         $user->last_name = trim($request->input('last_name'));
         $user->email = trim($request->input('email'));
         $user->password = Hash::make($request->input('last_name'));
         $user->role = 'deo';
         $user->save();


         //create deo in deo table
         $deo = new DeoModel();
         $deoId = DB::table('users')->where('email', $request->input('email') )->value('user_id');
         $deo ->user_id = $deoId;
         $deo -> name = trim($request->input('first_name')).' '.trim( $request->input('last_name'));
         $deo -> region = $request->input('region');
         $deo -> district = $request->input('district');
         $deo -> save();

         return redirect('manage_deos');

    }




    public function manageDistricts(){
        return view('dashboard.admin.manage_districts');
    }

    public function deoDetails(){

        $deoDetails = new DeoModel();
        return view('dashboard.admin.deo_details',['deoDetails' => $deoDetails ->all()]);
    }

    public function headTeachersDetails(){

        $headTeachers = DB::select('SELECT * FROM head_masters');

        return view('dashboard.admin.head_teachers_details',['headTeachers' => $headTeachers]);
    }


    public function storeHeadTeacher(Request $request){


        //Input validations

        //create user in user table
        $user = new User();
        $user->first_name = trim($request->input('first_name'));
        $user->second_name = trim($request->input('second_name'));
        $user->last_name = trim($request->input('last_name'));

        $fullname = trim($request->input('first_name')).' '.trim($request->input('second_name')).' '.trim($request->input('last_name'));
        //creating pupil email
        $_email = trim($request->input('first_name')) .trim( $request->input('last_name'));
        $user->email = trim($request->input('email'));
        $user->password = Hash::make($request->input('last_name'));
        $user->role = 'head_teacher';
        $user->save();


        //create headmaster in headmaster table
        $headMaster = new HeadMaster();
        $headMasterId = DB::table('users')->where('email',  trim($request->input('email')))->value('user_id');
        $headMaster -> user_id = $headMasterId;
        $headMaster -> name = trim($request->input('first_name')).' '.trim( $request->input('second_name')).' '.trim( $request->input('last_name'));
        $headMaster -> school_name = $request->input('school_name');
        $headMaster -> region = $request->input('region');
        $headMaster -> district = $request->input('district');
        $headMaster -> ward = 'ward';
        $headMaster -> deo = 'deo';
        $headMaster -> save();



        $_schoolName = $request->input('school_name');
        DB::update("UPDATE schools SET head_teacher_name = '$fullname' WHERE school_name ='$_schoolName'");

        return redirect('head_teachers_details');
    }




}
