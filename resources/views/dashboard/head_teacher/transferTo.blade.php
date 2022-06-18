@extends('layouts.head_teacher_dashboard')
@section('content')

    <div id="layoutSidenav_content">
        <div class="container table-responsive py-5">
            <!-- <div class="form-group pull-right">
                <input type="text" class="search form-control" placeholder="What you looking for?">
            </div> -->
            <div class="row">
                <div class="col-md-6">
                    <h6>Pupils Approved to your school</h6>
                </div>
            </div>

            <table class="table table-bordered table-hover results">
                <thead class="thead-dark">
                <tr>

                    <th scope="col">First Name</th>
                    <th scope="col">Middle Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Age</th>
                    <th scope="col">Class</th>
                    <th scope="col">School From</th>
                    <th scope="col">District From</th>
                    <th scope="col">Region From</th>
                    <th scope="col">Reason</th>

                </tr>

                </thead>
                <tbody>






                @for($i=0; $i<count($approvedStudents); $i++)
                    <tr>

                        <td>{{ $approvedStudents[$i]->first_name }}</td>
                        <td>{{ $approvedStudents[$i]->second_name }}</td>
                        <td>{{ $approvedStudents[$i]->last_name }}</td>
                        <td>{{ $approvedStudents[$i]->age }}</td>
                        <td>1</td>
                        <td>{{ $approvedStudents[$i]->schoolFrom }}</td>
                        <td>{{ $approvedStudents[$i]->districtFrom }}</td>
                        <td>{{ $approvedStudents[$i]->regionFrom }}</td>
                        <td>{{ $approvedStudents[$i]->reason }}</td>

                    </tr>

                @endfor




                </tbody>
            </table>
        </div>

    </div>

@endsection
