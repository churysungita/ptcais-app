@extends('layouts.pupil_dashboard')
@section('href',asset('css/admin/view_cards.css'))
@section('content')

        <div class="container pt-4" style="margin-right: 15px 15px 15px;">
            <!-- item lists one -->
            <div class="row">
                <div class="col-md-4">
                    <a class="datcard my-3" href="">
                            <span style="color:white;" class="h4 text-uppercase" >Name: {{ $user['first_name'] }}
                                {{ $user['second_name'] }} {{ $user['last_name'] }}
                            </span>
                        <br/>
                        <h6>School Name: {{ $studentInfo->school_name }} </h6>
                        <h6>Class: Standard {{$studentInfo->_class}}</h6>

                        <div class="go-corner">
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a class="datcard my-3" href="#">
                        <span style="color:white;" class="h4">Region name: {{ $studentInfo->region }}</span>

                        <div class="go-corner">
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a class="datcard my-3" href="#">
                        <span style="color:white;" class="h4">District name:{{ $studentInfo->district }} </span>

                        <div class="go-corner">
                        </div>
                    </a>
                </div>
            </div>
            <!-- item lists two -->

            <div class="row">
                <div class="col-md-6">
                    <a class="datcard my-3" >
                        <span style="color:white;" class="h4">Deo name: {{ $deo }}</span>

                        <div class="go-corner">
                        </div>
                    </a>
                </div>

                <div class="col-md-6">
                    <a class="datcard my-3" >
                        <span style="color:white;" class="h4">Head Teacher: {{ $studentInfo -> head_teacher }}</span>

                        <div class="go-corner">
                        </div>
                    </a>
                </div>
            </div>


    </div>



@endsection
