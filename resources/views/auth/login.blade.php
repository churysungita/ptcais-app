<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia&effect=fire">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide|Sofia|Trirong">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia&effect=fire">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&amp;lang=en"/>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <title>Login</title>
</head>

<body>

<section id="nav-bar">
    <nav class="navbar navbar-expand-sm navbar-light ">
        <div class="container-fluid ">
            <h1 class="font-effect-">PTCAIS</h1>
        </div>
    </nav>
</section>

<!-- Section: Design Block -->
<section id="main-banner">
    <!-- Jumbotron -->
    <div class="px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: hsl(0, 0%, 96%)">
        <div class="container">
            <div class="row gx-lg-5 align-items-center heading">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <h1 class="my-5 display-3 fw-bold ls-tight">
                        PUPILS TRANSFER <br/>
                        <span class="text-primary">AND CONTINOUS ASSESSMENT INFORMATION SYSTEM</span>
                    </h1>

                    <div class="img-fluid">
                        <img src="{{ asset('images/book.png') }}" alt="">
                    </div>

                </div>


                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="wrapper bg-white">
                        <div class="card">

                            <div class="card-body py-5 px-md-5">
                                <div class="card-text mb-3">
                                    <a href="#">
                                        <span class="glyphicon glyphicon-user"></span>
                                    </a>
                                </div>
                                <form action="{{ route('auth.index') }}" method="post">
                                    @csrf
                                    <!-- 2 column grid layout with text inputs for the first and last names -->
                                    <div class="row">

                                    </div>

                                    <!-- Email input -->
                                    <div class="form-outline mb-4">
                                        <input type="text" name="email" id="input-username" placeholder="Enter username" class="form-control"/>
                                        @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Password input -->
                                    <div class="form-outline mb-4">
                                        <input type="password" name="password" id="input-user-password" placeholder="Password"
                                               class=" form-control"/>
                                        @error('password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Submit button -->
                                    <button type="submit " class="btn btn-primary btn-block mb-4 "><i
                                            class="fa fa-sign-in" aria-hidden="false"> Login</i>
                                    </button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Jumbotron -->
</section>
<!-- Section: Design Block -->
</body>

</html>
