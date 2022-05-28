<?php

namespace App\Http\Controllers;
use App\Models\Region;
use App\Models\Student;
use App\Models\TransferRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HeadTeacherController extends Controller
{
    public function index()
    {

        $id = Auth::id();
        $headt_name = DB::select('select first_name,second_name, last_name from users where user_id = ' . $id);
        $full_name = $headt_name[0]->first_name . ' ' . $headt_name[0]->second_name . ' ' . $headt_name[0]->last_name;
        $final_name = "'$full_name'";
        $pupils = DB::select('select * from students where head_teacher =' . $final_name);


        return view('dashboard.head_teacher.index', ['total_pupil' => count($pupils)]);
    }

    public function pupils()
    {
        $headt_name = DB::select('select name from head_masters where user_id = ' . Auth::id());
        $_final = $headt_name[0]->name;
        $final_name = "'$_final'";
        $pupils = DB::select('select * from students where head_teacher = '.$final_name );

        return view('dashboard.head_teacher.manage_pupil', ['pupils' => $pupils]);
    }

    public function addPupil()
    {

        return view('dashboard.head_teacher.add_pupil');
    }

    public function createPupil(Request $request)
    {

        //validating the user inputs

        $user = new User();
        $user->first_name = $request->input('first_name');
        $user->second_name = $request->input('middle_name');
        $user->last_name = $request->input('last_name');
        //creating pupil email
        $_email = $request->input('first_name') . $request->input('last_name');
        $user->email = $_email . '@gmail.com';
        $user->password = Hash::make($request->input('last_name'));
        $user->role = 'pupil';
        $user->save();


        //saving student into student table
        $userId = DB::table('users')->where('email', $_email . '@gmail.com')->value('user_id');
        $student = new Student;
        $student->user_id = $userId;
        $student->age = $request->input('age');
        $student->gender = $request->input('gender');
        $student->region = DB::table('head_masters')->where('user_id', Auth::id())->value('region');
        $student->district = DB::table('head_masters')->where('user_id', Auth::id())->value('district');
        $student->deo = DB::table('head_masters')->where('user_id', Auth::id())->value('deo');
        $student->school_name = DB::table('head_masters')->where('user_id', Auth::id())->value('school_name');
        $student->head_teacher = DB::table('head_masters')->where('user_id', Auth::id())->value('name');
        $student->_class = $request->input('class');
        $student->save();

        return redirect('manage_pupil');
    }


    public function transferRequests()
    {
        $transferReq = TransferRequest::all();
        return view('dashboard.head_teacher.transfer_requests', ['transferRequest' => $transferReq]);
    }


    public function update_status(Request $req):void
    {

        $id=$req->all()['id'];
        DB::update("update transfer set HT_status= 'approved' where transfer_id='$id'");


    }

}
