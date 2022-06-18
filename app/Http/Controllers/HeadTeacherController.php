<?php

namespace App\Http\Controllers;
use App\Models\Region;
use App\Models\Student;
use App\Models\Teachers;
use App\Models\TeachersClasses;
use App\Models\TransferRequest;
use App\Models\User;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class HeadTeacherController extends Controller
{
    public function index()
    {

        //$headt_name = DB::select('select first_name,second_name, last_name from users where user_id = '.Auth::id());
        //$full_name = $headt_name[0]->first_name . ' ' . $headt_name[0]->second_name . ' ' . $headt_name[0]->last_name;
        //$final_name = "'$full_name'";

        $name = DB::select('SELECT name FROM head_masters WHERE user_id ='.Auth::id());
        $fullname = $name[0]->name;

        $pupils = DB::select("select * from students where head_teacher ="."'$fullname'");
        return view('dashboard.head_teacher.index', ['total_pupil' => count($pupils)]);
    }

    public function pupils(){

        $headt_name = DB::select('select name from head_masters where user_id = ' . Auth::id());
        $_final = $headt_name[0]->name;
        $final_name = "'$_final'";
        $school = DB::select('select school_name from head_masters where user_id = ' . Auth::id());

        $_school = $school[0]->school_name;

        $pupils = DB::select("SELECT first_name,second_name,last_name,age,_class,gender FROM `students`,`users` WHERE `users`.`user_id`=`students`.`user_id` AND (`students`.school_name='$_school' AND head_teacher='$_final'); ");

        return view('dashboard.head_teacher.manage_pupil', ['pupils' => $pupils,
            'pupilsCount' => count($pupils)]);
    }



    public function addPupil(){

        return view('dashboard.head_teacher.add_pupil');
    }


    public function storeTeacher(Request $request){
        $user = new User();

        $validator = $request->validate([
            'first_name' => 'required|string',
            'middle_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
        ]);

        $user-> first_name = $request ->input('first_name');
        $user-> second_name = $request ->input('middle_name');
        $user-> last_name = $request ->input('last_name');
        //creating pupil email
        $_email = $request->input('first_name') . $request->input('last_name');
        $user->email = $_email . '@gmail.com';
        $user->password = Hash::make($request->input('last_name'));
        $user-> role = "teacher";
        $user -> save();
        $_id= DB::getPdo()->lastInsertId();

        $first_name = $request -> input('first_name');
        $middle_name = $request -> input('middle_name');
        $last_name = $request -> input('last_name');

        $fullname = trim($first_name).' '.trim($middle_name).' '.trim($last_name);
        $result = DB::select(" SELECT * FROM teachers WHERE fullname = '$fullname '");

        if(count($result) > 0){
            $id = DB::select(" SELECT teacher_id FROM teachers WHERE fullname = '$fullname '");
            $ids= $id[0]->teacher_id;
            $this->teacherClass($request,$ids);
        }else{
            $teacher = new Teachers();
            $teacher -> user_id = $_id;
            $teacher -> fullname = $fullname;
            $teacher -> School_name = DB::table('head_masters')->where('user_id',Auth::id())->value('school_name');
            $teacher -> save();
            $id= DB::getPdo()->lastInsertId();
            $this->teacherClass($request,$id);

        }


    }

    public function teacherClass(Request $request,$id){
        $keys=['classOne','classTwo','classThree','classFour','classFive','classSix','classSeven'];

        $existValues =array();

       for($i=0; $i<count($keys); $i++){
           if(key_exists($keys[$i],$request->all())){

              array_push($existValues,$keys[$i]);

           }else {

           }
       }


        for ($i=0; $i<count($existValues); $i++){

           $class=$existValues[$i];
           $teacher_id=$id;

           DB::insert("INSERT INTO teacher_classes (tcId, teacher_id, teacher_class, created_at, updated_at)
            VALUES (null,'$teacher_id','$class', null, null)");

       }

        //return redirect('manage_teachers');
        echo '<script>location.href="manage_teachers"</script>';
        //return Redirect::route('manage_teachers');
    }



    public function createPupil(Request $request)
    {


        $validator = $request->validate([
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'class' => 'required',
        ]);

        $user = new User();
        $user->first_name = trim($request->input('first_name'));
        $user->second_name = trim($request->input('middle_name'));
        $user->last_name = trim($request->input('last_name'));
        $user->email = trim($request->input('email'));
        $user->password = Hash::make($request->input('last_name'));
        $user->role = 'pupil';
        $user->save();


        //saving student into student table
        $userId = DB::table('users')->where('email', trim($request->input('email')))->value('user_id');
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


    public function transferRequests(){
        // depends upon school from

        $school = DB::select('SELECT school_name FROM head_masters WHERE user_id ='.Auth::id());
        $_schoolFrom = $school[0]->school_name;
        $transferReq = DB::select("SELECT * FROM transfer WHERE schoolFrom ="."'$_schoolFrom'");

        return view('dashboard.head_teacher.transfer_requests', [
            'transferRequest' => $transferReq,
            'transferCount'=>count($transferReq)
        ]);
    }


    public function manageTeacher(){
        return view('dashboard.head_teacher.manage_teacher');
    }

    public function manageTeachers(){
        //The method seems to be not working
        return view('dashboard.head_teacher.manage_teachers');
    }

    public function update_status(Request $req):void{
        $id=$req->all()['id'];
        DB::update("update transfer set HT_status= 'approved' where transfer_id='$id'");
    }

    public function transferTo(){
        //check if deo approved transfer for given school and deo_status == approved

        $schoolName = DB::select('SELECT school_name FROM head_masters where user_id ='.Auth::id());
        $_schoolName = $schoolName[0]->school_name;
        $approvedStudents = DB::select("SELECT * FROM transfer where schoolTo = "."'$_schoolName' AND transfer.DEO_status = 'approved' ");

        //dd($approvedStudents);

        return view('dashboard.head_teacher.transferTo',[
            'approvedStudents' => $approvedStudents
        ]);
    }


    public function resetPassword(){
        return view('dashboard.head_teacher.reset_password');
    }

    public function storePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => 'required',
            'new_confirm_password' => ['same:new_password'],
        ]);

        if ($validator->fails()) {
            return redirect('head_teacher_reset')
                ->withErrors($validator)
                ->withInput();
        }else{
            return redirect('head_teacher');
        }

    }

}
