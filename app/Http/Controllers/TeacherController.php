<?php

namespace App\Http\Controllers;

use App\Models\CA;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class TeacherController extends Controller
{
    public function index(){
        $id = Auth::id();
        $teacher = DB::select ("SELECT * FROM users where user_id =".$id);


        return view('dashboard.teacher.index');
    }



    public function ca(){


         $class=$_GET['classes'];

         $teacherId = Auth::id();
         $students = DB::select("SELECT student_id,
                   `students`.`user_id`,
                   `teachers`.`user_id` AS
                       teacher_user_id,
                   `schools`.`school_name`,
                   _class,
                   teachers.teacher_id,
                   first_name,
                   second_name,
                   last_name
            FROM `users`,
                 `students`,
                 `schools`,
                 `teachers`
            WHERE (`students`.`school_name` = `schools`.`school_name`)
              AND (`teachers`.`School_name` = `schools`.`school_name`
                AND `users`.`user_id` = `students`.`user_id`)
              AND (_class = '$class' AND `teachers`.`user_id` = '$teacherId');");

         echo json_encode($students);

    }


    public function marks(Request $request){
       $message=array();
        $sid=$request -> all()['studenid'];
        $kiswahili =$request -> all()['kiswahili'];
        $uraia =$request -> all()['uraia'];
        $hisabati =$request -> all()['hisabati'];
        $sayansi =$request -> all()['sayansi'];
        $english =$request -> all()['english'];

        $subjects = ['kiswahili'=>$kiswahili,'uraia'=>$uraia,'hisabati'=>$hisabati,'sayansi'=>$sayansi,'english'=>$english];
        $_subjects =json_encode($subjects);


        /*$ca = new CA();
        $ca -> terminal =;

        */

        if ($request -> all()['term'] == 'terminal'){
            //check if student id already exist on the table
            //if not
            $isExist = DB::select("Select * from c_a_s where student_id = '$sid'");

            if($isExist == null){

                DB::insert("INSERT INTO c_a_s(terminal, student_id)
                    VALUES ('$_subjects','$sid') ");

            }else{
                DB::update("Update c_a_s set terminal = '$_subjects' where student_id = '$sid'");

                $aa=DB::table('c_a_s')->where('student_id',$sid)->value('annual');
                $ab=DB::table('c_a_s')->where('student_id',$sid)->value('terminal');

               if($aa===null){
                   echo "btn-dark";
               }else {
                  echo "btn-success";
               }



            }

        }


        if ($request -> all()['term'] == 'annual'){
            $isExist = DB::select("Select * from c_a_s where student_id = '$sid'");

            if($isExist == null){
                DB::insert("INSERT INTO c_a_s(annual, student_id)
                    VALUES ('$_subjects','$sid') ");
            }else{
                DB::update("Update c_a_s set annual = '$_subjects' where student_id = '$sid'");


                $aa=DB::table('c_a_s')->where('student_id',$sid)->value('annual');
                $ab=DB::table('c_a_s')->where('student_id',$sid)->value('terminal');

                if($aa===null){
                    echo "btn-dark";
                }else {
                    echo "btn-success";
                }

            }

            print_r($message);
        }


//        echo json_encode($request -> all());
    }




}
