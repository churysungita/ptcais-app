@extends('layouts.pupil_dashboard')
@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container">
                <!-- item lists one -->
                <div class="row">
                    <div class="col-md-4">
                        <a class="datcard my-3" href="">
                            <span style="color:white;" class="h4">Name: {{ $user['first_name'] }}
                                {{ $user['second_name'] }} {{ $user['last_name'] }}
                            </span>
                            <br/>
                            <h6>School Name: </h6>
                            <h6>Class: Standard One</h6>

                            <div class="go-corner">
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a class="datcard my-3" href="#">
                            <span style="color:white;" class="h4">Region name: Chamwino</span>

                            <div class="go-corner">
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a class="datcard my-3" href="#">
                            <span style="color:white;" class="h4">District name:Dodoma </span>

                            <div class="go-corner">
                            </div>
                        </a>
                    </div>
                </div>
                <!-- item lists two -->

                <div class="row">
                    <div class="col-md-4">
                        <a class="datcard my-3" >
                            <span style="color:white;" class="h4">Deo name: Juma Hamidu</span>

                            <div class="go-corner">
                            </div>
                        </a>
                    </div>

                    <div class="col-md-4">
                        <a class="datcard my-3" >
                            <span style="color:white;" class="h4">Head Teacher: Hamis Juma Mbaruku</span>

                            <div class="go-corner">
                            </div>
                        </a>
                    </div>
                </div>

            </div>
        </main>

    </div>
@endsection
