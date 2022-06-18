@extends('layouts.head_teacher_dashboard')
@section('content')


<div id="layoutSidenav_content">
    <div class="container mt-3">
        <h3>Add Pupil Form</h3>

        <form action="{{ url('add_pupil') }}" id="bootstrap-form"  method="post">
        @csrf

        <div class="col-md-6 mb-3 mt-3">
            <input type="text" class="form-control" id="first_name" placeholder="Enter first name" name="first_name" required>

        </div>
        <div class="col-md-6 mb-3 mt-3">
            <input type="text" class="form-control" id="middle_name" placeholder="Enter  middle name" name="middle_name" required>

        </div>
        <div class="col-md-6 mb-3 mt-3">
            <input type="text" class="form-control" id="last_name" placeholder="Enter last name" name="last_name" required>
        </div>

            <div class="col-md-6 mb-3 mt-3">
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
            </div>

            <div class="col-md-6 mb-3 mt-3">
                <input type="number" min="6" class="form-control" placeholder="Pupil age" name="age"  required>
            </div>

        <div class="col-md-6 mb-3 mt-3">
            <select type="text" class="form-select" id="gender" placeholder="select  gender" name="gender" required>
                <option value="">select gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </div>
        <div class="col-md-6 mb-3 mt-3">
            <select type="text" class="form-select" id="class" placeholder="select  class" name="class" required>
                <option value="" name="cname" >select class</option>
                <option value="1" name="cname" >Standard one</option>
                <option value="2" name="cname" >Standard two</option>
                <option value="3" name="cname" >Standard three</option>
                <option value="4" name="cname" >Standard four</option>
                <option value="5" name="cname" >Standard five</option>
                <option value="6" name="cname" >Standard six</option>
                <option value="7" name="cname" >Standard Seven</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary" value="Validate" onclick="Validate()">create pupil</button>
        </form>
    </div>

</div>


@endsection
