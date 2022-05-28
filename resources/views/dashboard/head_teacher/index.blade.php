@extends('layouts.head_teacher_dashboard')

@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container">
                <!-- item lists one -->
                <div class="row">
                    <div class="col-md-4">
                        <a class="datcard my-3" href="{{ url('manage_pupil') }}">
                            <span style="color:white;" class="h4">Pupils</span>
                            <h4>Total: {{ $total_pupil }}</h4>
                            <p> Click to view</p>
                            <div class="go-corner">
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a class="datcard my-3" href="#">
                            <span style="color:white;" class="h4">Teachers</span>
                            <h4>Total:490</h4>
                            <p> Click to view</p>
                            <div class="go-corner">
                            </div>
                        </a>
                    </div>

                    <!-- item lists two -->

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
