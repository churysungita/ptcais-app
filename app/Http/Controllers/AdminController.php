<?php

namespace App\Http\Controllers;

use App\Models\SchoolModel;
use Illuminate\Http\Request;
use App\Models\DeoModel;

class AdminController extends Controller
{
    public function adminDashboard(){
        return view('dashboard.admin.admin');
    }

    public function manageHeadTeachers(){
        return view('dashboard.admin.manage_head_teachers');
    }

    public function manageRegions(){
        return view('dashboard.admin.manage_regions');
    }

    public function manageSchools(){
        $schools = new SchoolModel();
        return view('dashboard.admin.manage_schools',['schools' => $schools -> all()]);
    }

    public function manageDeos(){
        $deoDetails = new DeoModel();
        return view('dashboard.admin.deo_details',['deoDetails' => $deoDetails ->all()]);

    }

    public function manageDistricts(){
        return view('dashboard.admin.manage_districts');
    }

    public function deoDetails(){

        $deoDetails = new DeoModel();
        return view('dashboard.admin.deo_details',['deoDetails' => $deoDetails ->all()]);
    }

    public function headTeachersDetails(){
        return view('dashboard.admin.head_teachers_details');
    }







}
