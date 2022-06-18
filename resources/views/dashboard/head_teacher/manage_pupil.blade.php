@extends('layouts.head_teacher_dashboard')
@section('content')

    <div id="layoutSidenav_content">
        <main>
            <div class="container-lg">
                <div class="table-responsive">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-8">
                                    <h2>Pupils <b>Details</b></h2>
                                </div>

                                <div class="col-sm-4">
                                    <div class="search-box">
                                        <div class="input-group">
                                            <input type="text" id="search" class="form-control" placeholder="Search by Pupil name">
                                            <span class="input-group-addon"><i class="material-icons">&#xE8B6;</i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Second Name</th>
                                <th>Last Name</th>
                                <th>Class</th>
                                <th>Age</th>
                                <th>Gender</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>

                            @foreach($pupils as $pupil)
                                <tr>
                                    <td>{{ $pupil->first_name }}</td>
                                    <td>{{ $pupil->second_name }}</td>
                                    <td>{{ $pupil->last_name }}</td>
                                    <td>{{ $pupil->_class }}</td>
                                    <td>{{ $pupil->age }}</td>
                                    <td>{{ $pupil->gender }}</td>



                                    <td>
                                        <a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
                                        <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                                        <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                                    </td>
                                </tr>
                            @endforeach





                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website 2022</div>
                    <div>
                        <a href="#">Privacy Policy</a> &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>

@endsection
