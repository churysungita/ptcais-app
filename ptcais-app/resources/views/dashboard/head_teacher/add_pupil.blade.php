@extends('layouts.head_teacher_dashboard')
@section('content')

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Pupil Registration</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{ url('head_teacher') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Add Pupils</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-body">
                        <!-- =====manage pupil======= -->
                        <div class="container">

                            <br/>
                            <form action="{{ url('add_pupil') }}" method="POST">
                                @csrf
                                <!--=== row 1=== -->
                                <div class="row">

                                    <div class="col-4">
                                        <label>First Name:</label>
                                        <input type="text" class="form-control" placeholder="First name" name="first_name" required>
                                    </div>

                                    <div class="col-4">
                                        <label>Middle Name:</label>
                                        <input type="text" class="form-control" placeholder="middle name" name="middle_name" required>
                                    </div>
                                    <div class="col-4">
                                        <label>Last Name:</label>
                                        <input type="text" class="form-control" placeholder="Last name" name="last_name" required>
                                    </div>
                                </div>
                                <br><br>
                                <!-- ====row 2=== -->
                                <div class="row">

                                    <div class="col-3">
                                        <label>Pupil Age:</label>
                                        <input type="number" min="6" class="form-control" placeholder="Pupil age" name="age" rule="required|numbers" required>
                                    </div>
                                    <div class="col-3">
                                        <label>Gender:</label><br>
                                        <select id="choices-multiple-remove-button" name="gender" class="gender" placeholder="Select gender" required>
                                            <option value="male" name="gender" >Male</option>
                                            <option value="female" name="gender" >Female</option>
                                        </select>
                                    </div>


                                    <div class="col-3">
                                        <label>Class:</label><br>
                                        <select id="choices-multiple-remove-button" name="class" class="class_name" placeholder="Select class" required>

                                            <option value="1" name="cname" >Standard one</option>
                                            <option value="2" name="cname" >Standard two</option>
                                            <option value="3" name="cname" >Standard three</option>
                                            <option value="4" name="cname" >Standard four</option>
                                            <option value="5" name="cname" >Standard five</option>
                                            <option value="6" name="cname" >Standard six</option>
                                            <option value="7" name="cname" >Standard Seven</option>

                                        </select>
                                    </div>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-success save-btn">Save</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">

            </div>
        </footer>
    </div>

@endsection
