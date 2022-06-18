@extends('layouts.head_teacher_dashboard')
@section('content')

<main>
            <div class="container">
                
                <div class="container">
                    <div class="row">
                       
                    <form action="/manage_teacher" method="post" id="bootstrap-form">
                                @csrf

                                <div class="row">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12 " style="color:#0F2036">
                                                <div class="card" style="margin:50px 0">
                                                    <div class="card-header">Teacher Informations</div>
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item">

                                                            <div class="row"  style="color:#0F2036">
                                                                <div class="col-md-3 mb-3 mt-3"  style="color:#0F2036">
                                                                    <input type="text" class="form-control" id="first_name" placeholder="Enter first name" name="first_name" required>

                                                                </div>
                                                                <div class="col-md-3 mb-3 mt-3">
                                                                    <input type="text" class="form-control" id="middle_name" placeholder="Enter middle name" name="middle_name" required>

                                                                </div>
                                                                <div class="col-md-3 mb-3 mt-3">
                                                                    <input type="text" class="form-control" id="last_name" placeholder="Enter last name" name="last_name" required>
                                                                </div>
                                                                <div class="col-md-3 mb-3 mt-3">
                                                                    <select class="form-select" id="select-bootstrap" required placeholder="Select a gender..." name="gender">
                                                                        <option value="">Select Gender</option>
                                                                        <option value="male">Male</option>
                                                                        <option value="female">Female</option>

                                                                    </select>

                                                                </div>
                                                            </div>
                                                        </li>

                                                    </ul>

                                                    <div class="card-header">Classes</div>
                                                    <!-- ===class one==== -->
                                                    <ul class="list-group list-group-flush"  style="color:#0F2036">
                                                        <li class="list-group-item">

                                                            <div class="row">
                                                                <div class="col-md-6"  style="color:#0F2036">
                                                                    <label class="checkbox">
                                                                        <input type="checkbox"  name="classOne" value="classOne"/>
                                                                        <span class="default"  style="color:#0F2036">Standard One</span>
                                                                    </label>
                                                                    <div class="col-md-6">
                                                                        <div id="standard_one">
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                            </div>
                                                        </li>

                                                    </ul>

                                                    <!-- ====class two==== -->
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item">

                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label class="checkbox">
                                                                        <input type="checkbox" name="classTwo" value="classTwo" />
                                                                        <span class="default"  style="color:#0F2036">Standard Two</span>
                                                                    </label>
                                                                    <div class="col-md-6">
                                                                        <div id="standard_two">
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                            </div>
                                                        </li>

                                                    </ul>

                                                    <!-- ====class three==== -->
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item">

                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label class="checkbox">
                                                                        <input type="checkbox" name="classThree" value="classThree"/>
                                                                        <span class="default"  style="color:#0F2036">Standard Three</span>
                                                                    </label>
                                                                    <div class="col-md-6">
                                                                        <div id="standard_three">
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                            </div>
                                                        </li>

                                                    </ul>

                                                    <!-- ====class four==== -->
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item">

                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label class="checkbox">
                                                                        <input type="checkbox" name="classFour" value="classFour"/>
                                                                        <span class="default"  style="color:#0F2036">Standard Four</span>
                                                                    </label>
                                                                    <div class="col-md-6">
                                                                        <div id="standard_four">
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                            </div>
                                                        </li>

                                                    </ul>

                                                    <!-- ====class five==== -->
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item">

                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label class="checkbox">
                                                                        <input type="checkbox"  name="classFive" value="classFive"/>
                                                                        <span class="default"  style="color:#0F2036">Standard Five</span>
                                                                    </label>
                                                                    <div class="col-md-6">
                                                                        <div id="standard_five">
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                            </div>
                                                        </li>

                                                    </ul>


                                                    <!-- ====class six==== -->
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item">

                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label class="checkbox">
                                                                        <input type="checkbox" name="classSix" value="classSix" />
                                                                        <span class="default"  style="color:#0F2036">Standard Six</span>
                                                                    </label>
                                                                    <div class="col-md-6">
                                                                        <div id="standard_six">
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                            </div>
                                                        </li>

                                                    </ul>
                                                    <!-- ====class seven==== -->
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item">

                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label class="checkbox">
                                                                        <input type="checkbox"  name="classSeven" value="classSeven"/>
                                                                        <span class="default"  style="color:#0F2036">Standard Seven</span>
                                                                    </label>
                                                                    <div class="col-md-6">
                                                                        <div id="standard_seven">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6 mb-3 mt-3 ">

                                    <button type="submit " class="btn btn-primary " id="submit " onclick="Validate() ">Submit</button>
                                </div>



                            </form>

                    </div>
                </div>
            </div>

        </main>

<script src="{{ asset('js/headTeacher/add_teacher.js') }}"></script>
@endsection
