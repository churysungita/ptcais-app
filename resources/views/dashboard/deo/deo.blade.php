@extends('layouts.deo_dashboard')

@section('content')

    <div id="layoutSidenav_content">
        <main>
            <div class="container">
                <!-- item lists one -->
                <div class="row">
                    <div class="col-md-4">
                        <a class="datcard my-3" href="">
                            <span style="color:white;" class="h4">Name: {{ $deoDetails->name }}</span>
                            <br/>
                            <h6></h6>
                            <h6></h6>

                            <div class="go-corner">
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a class="datcard my-3" href="">
                            <span style="color:white;" class="h4">Region : {{ $deoDetails->region }}</span>

                            <div class="go-corner">
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a class="datcard my-3" href="">
                            <span style="color:white;" class="h4">District : {{ $deoDetails->district }}</span>

                            <div class="go-corner">
                            </div>
                        </a>
                    </div>
                </div>
                <!-- item lists two -->

                <div class="row">

                    <div class="col-md-4">
                        <a class="datcard my-3" href="#">
                            <span style="color:white;" class="h4">Head Teachers</span>
                            <h4>Total: {{ $headMasters }}</h4>
                            <p> Click to view</p>
                            <div class="go-corner">
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a class="datcard my-3" href="#">
                            <span style="color:white;" class="h4">Schools</span>
                            <h4>Total: {{ $schools }}</h4>
                            <p> Click to view</p>
                            <div class="go-corner">
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
            <!--<div class="container-fluid px-4">-->
            <!--    <div class="d-flex align-items-center justify-content-between small">-->
            <!--        <div class="text-muted">Copyright &copy; Your Website 2022</div>-->
            <!--        <div>-->
            <!--            <a href="#">Privacy Policy</a> &middot;-->
            <!--            <a href="#">Terms &amp; Conditions</a>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->
        </footer>
    </div>

@endsection
