@extends('layouts.admin_dashboard')
@section('content')
    <div id="layoutSidenav_content">
        <div class="container">
            <div class="table-responsive">
                <div class="table-wrapper">
                    <div class="container table-responsive">
                        <div class="table-title">
                            <div class="row mt-auto">
                                <div class="col-md-4">
                                    <h2><b>School Details</b></h2>
                                </div>
                                <div class="col-md-4">
                                    <button type="button" class="btn btn-info">Add New<a href="{{ url('create_school') }}"><i class="fa fa-plus"></i></a>

                                    </button>
                                </div>
                                <div class="col-md-4">
                                    <div class="search-box">
                                        <div class="input-group">
                                            <input type="text" id="search" class="form-control" placeholder="Search School">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-bordered table-hover">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">School</th>
                                <th scope="col">Registration</th>
                                <th scope="col">Region</th>
                                <th scope="col">District</th>
                                <th scope="col">Head Teacher</th>
                                <th scope="col">Status</th>


                            </tr>

                            </thead>
                            <tbody>


                            @foreach($schools as $school)
                                <tr>
                                    <td scope="row">{{ $school['id'] }}</td>
                                    <td>{{ $school['school_name'] }}</td>
                                    <td>{{ $school['registration_number'] }}</td>
                                    <td>{{ $school['region'] }}</td>
                                    <td>{{ $school['district'] }}</td>
                                    <td>{{ $school['head_teacher_name'] }}</td>
                                    <td>{{ $school['status'] }}</td>
                                </tr>


                            @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection
