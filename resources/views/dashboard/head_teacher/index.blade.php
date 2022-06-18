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
                        <a class="datcard my-3" href="{{ url('manage_teachers') }}">
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

    </div>

@endsection
